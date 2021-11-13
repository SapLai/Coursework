<?php
namespace Dompdf;
require 'vendor/autoload.php';

session_start();
$host = 'localhost';
$user = 'parkhu3l_tasks';
$pass = '%4H*ghkY';
$db_name = 'parkhu3l_tasks';
$conn = new \mysqli($host, $user, $pass, $db_name);
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM events WHERE user_id = '$user_id'";

if(isset($_POST['save_pdf']))
{
    $html = '<html><head><style>body { font-family: DejaVu Sans }</style>'.'</head>';
    $html.= '<p>Your tasks list (name and description)</p>';
    $html.= '<ul>';
        foreach ($conn->query($sql) as $row) {
          $html .= '<li>'.'<p>'. $row['name']. '</p>'.
                   '<p>'. $row['description'].'</p>'.
            '</li>';
    }
    $html.= '</ul>';
    $html.= '</html>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("/tasks.pdf");

    header('Location: /tasks.php');
}
?>