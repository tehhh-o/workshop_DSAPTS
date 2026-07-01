<?php
function refreshAlert($conn)
{
    $newAlertsCount = 0;
    $dismissedAlertsCount = 0;

    $alertMessages = [
        'CGPA Warning' => 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.',
        'Academic Standing Notice' => 'Your current academic standing is Average. Improvement is encouraged next semester.',
        'MUET Warning' => 'You have not taken MUET yet. Please consider completing MUET before graduation to ensure all graduation requirements are met.'
    ];

    $dateSent = date('Y-m-d');
    $allAlertTypes = array_keys($alertMessages);

    $sql = "SELECT user_id, CGPA, muet_status FROM student";
    $result = $conn->query($sql);

    if ($result) {
        while ($student = $result->fetch_assoc()) {
            $userId = $student['user_id'];
            $cgpa = (float) $student['CGPA'];
            $muetStatus = $student['muet_status'];

            $alertsToCheck = [];

            if ($muetStatus !== 'Pass') {
                $alertsToCheck[] = 'MUET Warning';
            }

            if ($cgpa < 2.0) {
                $alertsToCheck[] = 'CGPA Warning';
            }

            if ($cgpa >= 2.0 && $cgpa <= 2.5) {
                $alertsToCheck[] = 'Academic Standing Notice';
            }

            foreach ($allAlertTypes as $alertType) {
                $shouldBeActive = in_array($alertType, $alertsToCheck);

                // check if got existing active alert
                $checkSql = "
                    SELECT alert_id FROM alert
                    WHERE user_id = '$userId'
                    AND alert_type = '$alertType'
                ";
                $checkResult = $conn->query($checkSql);
                $exists = $checkResult && $checkResult->num_rows > 0;

                if ($shouldBeActive && !$exists) {
                    // condition is met but no alert yet so insert
                    $message = $alertMessages[$alertType];
                    $insertSql = "
                        INSERT INTO alert (user_id, alert_type, message, date_sent)
                        VALUES ('$userId', '$alertType', '$message', '$dateSent')
                    ";
                    $conn->query($insertSql);
                    $newAlertsCount++;
                } elseif (!$shouldBeActive && $exists) {
                    // alert exists but condition is no longer met then delete it
                    $deleteSql = "
                        DELETE FROM alert
                        WHERE user_id = '$userId'
                        AND alert_type = '$alertType'
                    ";
                    $conn->query($deleteSql);
                    $dismissedAlertsCount++;
                }
            }
        }
    }

    $uid = $_SESSION['uid'] ?? '';
    $isAdmin = str_starts_with($uid, 'A');

    $parts = [];
    if ($isAdmin) {
        if ($newAlertsCount > 0) {
            $parts[] = "$newAlertsCount alert(s) added";
        }
        if ($dismissedAlertsCount > 0) {
            $parts[] = "$dismissedAlertsCount alert(s) dismissed";
        }
        if (empty($parts)) {
            return "No changes: alerts are already up to date.";
        }
        return "Success: " . implode(", ", $parts) . ".";
    } else {
        if (empty($newAlertsCount) && empty($dismissedAlertsCount)) {
            return "No changes: alerts are already up to date.";
        }
        return "Success: alerts refreshed.";
    }
}
