
<?php


// recieve posts of the sequence object from new_seqence.js
// insert it into the database


// recieve posts of a sequence id from home.js
// retrieve sequence from database
// echo queue order and length of time to execute
// execute sequence

include 'Base.php';

class Controller_Sequence_Manager extends Controller_Base {

    function __construct() {
        parent::__construct();
    }

    public function route() {
        
	
        $sequence_array = $_POST["sequence_post"];
        $frame = 1;
        foreach ($sequence_array as $key => $value) {
            $entry = 1;
            echo json_encode("frame");
            echo json_encode($frame);
            foreach ($value as $sub_array => $value_b) {
                if ($entry < 9) {
                    echo json_encode("nozzle"), json_encode($entry);
                    echo json_encode("state"), json_encode($value_b);

                }
                else {
                    echo json_encode("frame_length"), json_encode($value_b);
                    $frame_length = (int)$value_b;
                }


                $entry++;
            }

            echo "\n";
            $frame++;
        }
        exec('sudo ./../external_libraries/php-blinker/myBlinker 17 27 1');
        

    }
}

$sequences = new Controller_Sequence_Manager();
$sequences->route();

?>


