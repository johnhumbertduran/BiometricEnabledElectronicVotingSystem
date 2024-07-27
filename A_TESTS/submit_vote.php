<?php
session_start();
include("../admindashboard/bins/connections.php");

if (isset($_SESSION["idnumber"])) {
    $session_id_number = $_SESSION["idnumber"];

    // echo "<script>alert('test');</script>";
    if ($_POST['president']) {
        $savepresident = $_POST['president'];
    }
    if ($_POST['vicepresident']) {
        $savevicepresident = $_POST['vicepresident'];
    }
    if ($_POST['secretary']) {
        $savesecretary = $_POST['secretary'];
    }
    if ($_POST['assistantsecretary']) {
        $saveassistantsecretary = $_POST['assistantsecretary'];
    }
    if ($_POST['treasurer']) {
        $savetreasurer = $_POST['treasurer'];
    }
    if ($_POST['assistanttreasurer']) {
        $saveassistanttreasurer = $_POST['assistanttreasurer'];
    }
    if ($_POST['auditor']) {
        $saveauditor = $_POST['auditor'];
    }
    if ($_POST['assistantauditor']) {
        $saveassistantauditor = $_POST['assistantauditor'];
    }
    if ($_POST['pio1']) {
        $savepio1 = $_POST['pio1'];
    }
    if ($_POST['pio2']) {
        $savepio2 = $_POST['pio2'];
    }
    if ($_POST['businessmanager']) {
        $savebusinessmanager = $_POST['businessmanager'];
    }
    if ($_POST['layoutartist1']) {
        $savelayoutartist1 = $_POST['layoutartist1'];
    }
    if ($_POST['layoutartist2']) {
        $savelayoutartist2 = $_POST['layoutartist2'];
    }
    if ($_POST['technicalsupport1']) {
        $savetechnicalsupport1 = $_POST['technicalsupport1'];
    }
    if ($_POST['technicalsupport2']) {
        $savetechnicalsupport2 = $_POST['technicalsupport2'];
    }

    if ($savepresident) {
        if ($savevicepresident) {
            if ($savesecretary) {
                if ($saveassistantsecretary) {
                    if ($savetreasurer) {
                        if ($saveassistanttreasurer) {
                            if ($saveauditor) {
                                if ($saveassistantauditor) {
                                    if ($savepio1) {
                                        if ($savepio2) {
                                            if ($savebusinessmanager) {
                                                if ($savelayoutartist1) {
                                                    if ($savelayoutartist2) {
                                                        if ($savetechnicalsupport1) {
                                                            if ($savetechnicalsupport2) {

                                                                $presidentquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$presidentelectionid', '$presidentposition', '$presidentidnumber')";
                                                                // if (mysqli_query($connections, $presidentquery)) {
                                                                // }

                                                                $vicepresidentquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$vicepresidentelectionid', '$vicepresidentposition', '$vicepresidentidnumber')";
                                                                // if (mysqli_query($connections, $vicepresidentquery)) {
                                                                // }

                                                                $secretaryquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$secretaryelectionid', '$secretaryposition', '$secretaryidnumber')";
                                                                // if (mysqli_query($connections, $secretaryquery)) {
                                                                // }

                                                                $assistantsecretaryquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$assistantsecretaryelectionid', '$assistantsecretaryposition', '$assistantsecretaryidnumber')";
                                                                // if (mysqli_query($connections, $assistantsecretaryquery)) {
                                                                // }

                                                                $treasurerquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$treasurerelectionid', '$treasurerposition', '$treasureridnumber')";
                                                                // if (mysqli_query($connections, $treasurerquery)) {
                                                                // }

                                                                $assistanttreasurerquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$assistanttreasurerelectionid', '$assistanttreasurerposition', '$assistanttreasureridnumber')";
                                                                // if (mysqli_query($connections, $assistanttreasurerquery)) {
                                                                // }

                                                                $auditorquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$auditorelectionid', '$auditorposition', '$auditoridnumber')";
                                                                // if (mysqli_query($connections, $auditorquery)) {
                                                                // }

                                                                $assistantauditorquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$assistantauditorelectionid', '$assistantauditorposition', '$assistantauditoridnumber')";
                                                                // if (mysqli_query($connections, $assistantauditorquery)) {
                                                                // }

                                                                $pio1query = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$pio1electionid', '$pio1position', '$pio1idnumber')";
                                                                // if (mysqli_query($connections, $pio1query)) {
                                                                // }

                                                                $pio2query = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$pio2electionid', '$pio2position', '$pio2idnumber')";
                                                                // if (mysqli_query($connections, $pio2query)) {
                                                                // }

                                                                $businessmanagerquery = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$businessmanagerelectionid', '$businessmanagerposition', '$businessmanageridnumber')";
                                                                // if (mysqli_query($connections, $businessmanagerquery)) {
                                                                // }

                                                                $layoutartist1query = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$layoutartist1electionid', '$layoutartist1position', '$layoutartist1idnumber')";
                                                                // if (mysqli_query($connections, $layoutartist1query)) {
                                                                // }

                                                                $layoutartist2query = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$layoutartist2electionid', '$layoutartist2position', '$layoutartist2idnumber')";
                                                                // if (mysqli_query($connections, $layoutartist2query)) {
                                                                // }

                                                                $technicalsupport1query = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$technicalsupport1electionid', '$technicalsupport1position', '$technicalsupport1idnumber')";
                                                                // if (mysqli_query($connections, $technicalsupport1query)) {
                                                                // }

                                                                $technicalsupport2query = "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$technicalsupport2electionid', '$technicalsupport2position', '$technicalsupport2idnumber')";
                                                                // if (mysqli_query($connections, $technicalsupport2query)) {
                                                                // }
                                                            } else {
                                                                echo "No Technical Support Selected";
                                                            }
                                                        } else {
                                                            echo "No Technical Support Selected";
                                                        }
                                                    } else {
                                                        echo "No Layout Artist 2 Selected";
                                                    }
                                                } else {
                                                    echo "No Layout Artist 1 Selected";
                                                }
                                            } else {
                                                echo "No Business Manager Selected";
                                            }
                                        } else {
                                            echo "No P.I.O. 2 Selected";
                                        }
                                    } else {
                                        echo "No P.I.O. 1 Selected";
                                    }
                                } else {
                                    echo "No Assistant Auditor Selected";
                                }
                            } else {
                                echo "No Auditor Selected";
                            }
                        } else {
                            echo "No Assistant Treasurer Selected";
                        }
                    } else {
                        echo "No Treasurer Selected";
                    }
                } else {
                    echo "No Assistant Secretary Selected";
                }
            } else {
                echo "No Secretary Selected";
            }
        } else {
            echo "No Vice President Selected";
        }
    } else {
        echo "No President Selected";
    }

    echo 'Vote submitted successfully!';
} else {
    echo 'User not authenticated';
}
