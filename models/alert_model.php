<?php
function refreshAlert($conn)
{
    $newAlertsCount = 0;

    $alertMessages = [
        'CGPA Warning' => 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.',
        'Academic Standing Notice' => 'Your current academic standing is Average. Improvement is encouraged next semester.',
        'MUET Warning' => 'You have not taken MUET yet. Please consider completing MUET before graduation to ensure all graduation requirements are met.'
    ];

    $dateSent = date('Y-m-d');

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

            foreach ($alertsToCheck as $alertType) {
                $checkSql = "
                    SELECT alert_id FROM alert
                    WHERE user_id = '$userId'
                    AND alert_type = '$alertType'
                ";
                $checkResult = $conn->query($checkSql);

                if ($checkResult && $checkResult->num_rows == 0) {
                    $message = $alertMessages[$alertType];
                    $insertSql = "
                        INSERT INTO alert (user_id, alert_type, message, date_sent)
                        VALUES ('$userId', '$alertType', '$message', '$dateSent')
                    ";

                    $conn->query($insertSql);
                    $newAlertsCount++;
                }
            }
        }
    }

    if ($newAlertsCount > 0) {
        return "Success: $newAlertsCount new alert(s) issued.";
    } else {
        return "No new alert issued.";
    }
}
