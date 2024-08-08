<?php
session_start();
include('bins/header.php');
include('bins/navigation.php');
include("../admindashboard/bins/connections.php");

if (isset($_SESSION["idnumber"])) {

    $session_id_number = $_SESSION["idnumber"];
    $check_voter_id_number = mysqli_query($connections, "SELECT * FROM voterstbl WHERE idnumber='$session_id_number'");
    $get_voter_id_number = mysqli_fetch_assoc($check_voter_id_number);
    $voter_firstName = $get_voter_id_number["firstname"];
    $voter_middleName = $get_voter_id_number["middlename"];
    $voter_lastName = $get_voter_id_number["lastname"];
    $voter_year = $get_voter_id_number["year"];
    $voter_course = $get_voter_id_number["course"];
    $voter_biometric = $get_voter_id_number["biometric"];
    $voter_electionid = $get_voter_id_number["electionid"];
    $voter_status = $get_voter_id_number["status"];

    $name = ucfirst($voter_firstName) . " " . ucfirst($voter_middleName[0]) . ". " . ucfirst($voter_lastName);

    if ($voter_status == 0) {
        // header('Location: election/');
    } elseif ($voter_status == 1) {

        header('Location: ../forbidden.php');
    }
}

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$response = ['status' => '', 'message' => ''];

$savepresident = $savevicepresident = $savesecretary = $saveassistantsecretary =
    $savetreasurer = $saveassistanttreasurer = $saveauditor = $saveassistantauditor =
    $savepio1 = $savepio2 = $savebusinessmanager = $savelayoutartist1 = $savelayoutartist2 =
    $savetechnicalsupport1 = $savetechnicalsupport2 = "";

// header('Content-Type: application/json');
if (isset($_POST['submit'])) {

    $savepresident = $_POST["president"] ?? '';
    $savevicepresident = $_POST["vicepresident"] ?? '';
    $savesecretary = $_POST["secretary"] ?? '';
    $saveassistantsecretary = $_POST["assistantsecretary"] ?? '';
    $savetreasurer = $_POST["treasurer"] ?? '';
    $saveassistanttreasurer = $_POST["assistanttreasurer"] ?? '';
    $saveauditor = $_POST["auditor"] ?? '';
    $saveassistantauditor = $_POST["assistantauditor"] ?? '';
    $savepio1 = $_POST["pio1"] ?? '';
    $savepio2 = $_POST["pio2"] ?? '';
    $savebusinessmanager = $_POST["businessmanager"] ?? '';
    $savelayoutartist1 = $_POST["layoutartist1"] ?? '';
    $savelayoutartist2 = $_POST["layoutartist2"] ?? '';
    $savetechnicalsupport1 = $_POST["technicalsupport1"] ?? '';
    $savetechnicalsupport2 = $_POST["technicalsupport2"] ?? '';


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

                                                                if ($savepresident == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'President', 'None')");
                                                                } else {
                                                                    $presidentlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savepresident' AND status = 'Active' ");

                                                                    $row_president_lists = mysqli_fetch_assoc($presidentlists);
                                                                    $presidentid = $row_president_lists["id"];
                                                                    $presidentidnumber = $row_president_lists["idnumber"];
                                                                    $presidentfirstname = $row_president_lists["firstname"];
                                                                    $presidentmiddlename = $row_president_lists["middlename"];
                                                                    $presidentlastname = $row_president_lists["lastname"];
                                                                    $presidentelectionid = $row_president_lists["electionid"];
                                                                    $presidentposition = $row_president_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$presidentelectionid', '$presidentposition', '$presidentidnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $presidentquery)) {
                                                                // }

                                                                if ($savevicepresident == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Vice President', 'None')");
                                                                } else {
                                                                    $vicepresidentlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savevicepresident' AND status = 'Active' ");

                                                                    $row_vicepresident_lists = mysqli_fetch_assoc($vicepresidentlists);
                                                                    $vicepresidentid = $row_vicepresident_lists["id"];
                                                                    $vicepresidentidnumber = $row_vicepresident_lists["idnumber"];
                                                                    $vicepresidentfirstname = $row_vicepresident_lists["firstname"];
                                                                    $vicepresidentmiddlename = $row_vicepresident_lists["middlename"];
                                                                    $vicepresidentlastname = $row_vicepresident_lists["lastname"];
                                                                    $vicepresidentelectionid = $row_vicepresident_lists["electionid"];
                                                                    $vicepresidentposition = $row_vicepresident_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$vicepresidentelectionid', '$vicepresidentposition', '$vicepresidentidnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $vicepresidentquery)) {
                                                                // }

                                                                if ($savesecretary == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Secretary', 'None')");
                                                                } else {
                                                                    $secretarylists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savesecretary' AND status = 'Active' ");

                                                                    $row_secretary_lists = mysqli_fetch_assoc($secretarylists);
                                                                    $secretaryid = $row_secretary_lists["id"];
                                                                    $secretaryidnumber = $row_secretary_lists["idnumber"];
                                                                    $secretaryfirstname = $row_secretary_lists["firstname"];
                                                                    $secretarymiddlename = $row_secretary_lists["middlename"];
                                                                    $secretarylastname = $row_secretary_lists["lastname"];
                                                                    $secretaryelectionid = $row_secretary_lists["electionid"];
                                                                    $secretaryposition = $row_secretary_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$secretaryelectionid', '$secretaryposition', '$secretaryidnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $secretaryquery)) {
                                                                // }

                                                                if ($saveassistantsecretary == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Assistant Secretary', 'None')");
                                                                } else {
                                                                    $assistantsecretarylists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$saveassistantsecretary' AND status = 'Active' ");

                                                                    $row_assistantsecretary_lists = mysqli_fetch_assoc($assistantsecretarylists);
                                                                    $assistantsecretaryid = $row_assistantsecretary_lists["id"];
                                                                    $assistantsecretaryidnumber = $row_assistantsecretary_lists["idnumber"];
                                                                    $assistantsecretaryfirstname = $row_assistantsecretary_lists["firstname"];
                                                                    $assistantsecretarymiddlename = $row_assistantsecretary_lists["middlename"];
                                                                    $assistantsecretarylastname = $row_assistantsecretary_lists["lastname"];
                                                                    $assistantsecretaryelectionid = $row_assistantsecretary_lists["electionid"];
                                                                    $assistantsecretaryposition = $row_assistantsecretary_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$assistantsecretaryelectionid', '$assistantsecretaryposition', '$assistantsecretaryidnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $assistantsecretaryquery)) {
                                                                // }

                                                                if ($savetreasurer == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Treasurer', 'None')");
                                                                } else {
                                                                    $treasurerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savetreasurer' AND status = 'Active' ");

                                                                    $row_treasurer_lists = mysqli_fetch_assoc($treasurerlists);
                                                                    $treasurerid = $row_treasurer_lists["id"];
                                                                    $treasureridnumber = $row_treasurer_lists["idnumber"];
                                                                    $treasurerfirstname = $row_treasurer_lists["firstname"];
                                                                    $treasurermiddlename = $row_treasurer_lists["middlename"];
                                                                    $treasurerlastname = $row_treasurer_lists["lastname"];
                                                                    $treasurerelectionid = $row_treasurer_lists["electionid"];
                                                                    $treasurerposition = $row_treasurer_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$treasurerelectionid', '$treasurerposition', '$treasureridnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $treasurerquery)) {
                                                                // }

                                                                if ($saveassistanttreasurer == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Assistant Treasurer', 'None')");
                                                                } else {
                                                                    $assistanttreasurerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$saveassistanttreasurer' AND status = 'Active' ");

                                                                    $row_assistanttreasurer_lists = mysqli_fetch_assoc($assistanttreasurerlists);
                                                                    $assistanttreasurerid = $row_assistanttreasurer_lists["id"];
                                                                    $assistanttreasureridnumber = $row_assistanttreasurer_lists["idnumber"];
                                                                    $assistanttreasurerfirstname = $row_assistanttreasurer_lists["firstname"];
                                                                    $assistanttreasurermiddlename = $row_assistanttreasurer_lists["middlename"];
                                                                    $assistanttreasurerlastname = $row_assistanttreasurer_lists["lastname"];
                                                                    $assistanttreasurerelectionid = $row_assistanttreasurer_lists["electionid"];
                                                                    $assistanttreasurerposition = $row_assistanttreasurer_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$assistanttreasurerelectionid', '$assistanttreasurerposition', '$assistanttreasureridnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $assistanttreasurerquery)) {
                                                                // }

                                                                if ($saveauditor == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Auditor', 'None')");
                                                                } else {
                                                                    $auditorlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$saveauditor' AND status = 'Active' ");

                                                                    $row_auditor_lists = mysqli_fetch_assoc($auditorlists);
                                                                    $auditorid = $row_auditor_lists["id"];
                                                                    $auditoridnumber = $row_auditor_lists["idnumber"];
                                                                    $auditorfirstname = $row_auditor_lists["firstname"];
                                                                    $auditormiddlename = $row_auditor_lists["middlename"];
                                                                    $auditorlastname = $row_auditor_lists["lastname"];
                                                                    $auditorelectionid = $row_auditor_lists["electionid"];
                                                                    $auditorposition = $row_auditor_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$auditorelectionid', '$auditorposition', '$auditoridnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $auditorquery)) {
                                                                // }

                                                                if ($saveassistantauditor == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Assistant Auditor', 'None')");
                                                                } else {
                                                                    $assistantauditorlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$saveassistantauditor' AND status = 'Active' ");

                                                                    $row_assistantauditor_lists = mysqli_fetch_assoc($assistantauditorlists);
                                                                    $assistantauditorid = $row_assistantauditor_lists["id"];
                                                                    $assistantauditoridnumber = $row_assistantauditor_lists["idnumber"];
                                                                    $assistantauditorfirstname = $row_assistantauditor_lists["firstname"];
                                                                    $assistantauditormiddlename = $row_assistantauditor_lists["middlename"];
                                                                    $assistantauditorlastname = $row_assistantauditor_lists["lastname"];
                                                                    $assistantauditorelectionid = $row_assistantauditor_lists["electionid"];
                                                                    $assistantauditorposition = $row_assistantauditor_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$assistantauditorelectionid', '$assistantauditorposition', '$assistantauditoridnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $assistantauditorquery)) {
                                                                // }

                                                                if ($savepio1 == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'P.I.O.', 'None')");
                                                                } else {
                                                                    $pio1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savepio1' AND status = 'Active' ");

                                                                    $row_pio1_lists = mysqli_fetch_assoc($pio1lists);
                                                                    $pio1id = $row_pio1_lists["id"];
                                                                    $pio1idnumber = $row_pio1_lists["idnumber"];
                                                                    $pio1firstname = $row_pio1_lists["firstname"];
                                                                    $pio1middlename = $row_pio1_lists["middlename"];
                                                                    $pio1lastname = $row_pio1_lists["lastname"];
                                                                    $pio1electionid = $row_pio1_lists["electionid"];
                                                                    $pio1position = $row_pio1_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$pio1electionid', '$pio1position', '$pio1idnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $pio1query)) {
                                                                // }

                                                                if ($savepio2 == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'P.I.O.', 'None')");
                                                                } else {
                                                                    $pio2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savepio2' AND status = 'Active' ");

                                                                    $row_pio2_lists = mysqli_fetch_assoc($pio2lists);
                                                                    $pio2id = $row_pio2_lists["id"];
                                                                    $pio2idnumber = $row_pio2_lists["idnumber"];
                                                                    $pio2firstname = $row_pio2_lists["firstname"];
                                                                    $pio2middlename = $row_pio2_lists["middlename"];
                                                                    $pio2lastname = $row_pio2_lists["lastname"];
                                                                    $pio2electionid = $row_pio2_lists["electionid"];
                                                                    $pio2position = $row_pio2_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$pio2electionid', '$pio2position', '$pio2idnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $pio2query)) {
                                                                // }

                                                                if ($savebusinessmanager == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Business Manager', 'None')");
                                                                } else {
                                                                    $businessmanagerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savebusinessmanager' AND status = 'Active' ");

                                                                    $row_businessmanager_lists = mysqli_fetch_assoc($businessmanagerlists);
                                                                    $businessmanagerid = $row_businessmanager_lists["id"];
                                                                    $businessmanageridnumber = $row_businessmanager_lists["idnumber"];
                                                                    $businessmanagerfirstname = $row_businessmanager_lists["firstname"];
                                                                    $businessmanagermiddlename = $row_businessmanager_lists["middlename"];
                                                                    $businessmanagerlastname = $row_businessmanager_lists["lastname"];
                                                                    $businessmanagerelectionid = $row_businessmanager_lists["electionid"];
                                                                    $businessmanagerposition = $row_businessmanager_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$businessmanagerelectionid', '$businessmanagerposition', '$businessmanageridnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $businessmanagerquery)) {
                                                                // }

                                                                if ($savelayoutartist1 == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Layout Artist', 'None')");
                                                                } else {
                                                                    $layoutartist1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savelayoutartist1' AND status = 'Active' ");

                                                                    $row_layoutartist1_lists = mysqli_fetch_assoc($layoutartist1lists);
                                                                    $layoutartist1id = $row_layoutartist1_lists["id"];
                                                                    $layoutartist1idnumber = $row_layoutartist1_lists["idnumber"];
                                                                    $layoutartist1firstname = $row_layoutartist1_lists["firstname"];
                                                                    $layoutartist1middlename = $row_layoutartist1_lists["middlename"];
                                                                    $layoutartist1lastname = $row_layoutartist1_lists["lastname"];
                                                                    $layoutartist1electionid = $row_layoutartist1_lists["electionid"];
                                                                    $layoutartist1position = $row_layoutartist1_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$layoutartist1electionid', '$layoutartist1position', '$layoutartist1idnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $layoutartist1query)) {
                                                                // }

                                                                if ($savelayoutartist2 == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Layout Artist', 'None')");
                                                                } else {
                                                                    $layoutartist2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savelayoutartist2' AND status = 'Active' ");

                                                                    $row_layoutartist2_lists = mysqli_fetch_assoc($layoutartist2lists);
                                                                    $layoutartist2id = $row_layoutartist2_lists["id"];
                                                                    $layoutartist2idnumber = $row_layoutartist2_lists["idnumber"];
                                                                    $layoutartist2firstname = $row_layoutartist2_lists["firstname"];
                                                                    $layoutartist2middlename = $row_layoutartist2_lists["middlename"];
                                                                    $layoutartist2lastname = $row_layoutartist2_lists["lastname"];
                                                                    $layoutartist2electionid = $row_layoutartist2_lists["electionid"];
                                                                    $layoutartist2position = $row_layoutartist2_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$layoutartist2electionid', '$layoutartist2position', '$layoutartist2idnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $layoutartist2query)) {
                                                                // }

                                                                if ($savetechnicalsupport1 == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Technical Support', 'None')");
                                                                } else {
                                                                    $technicalsupport1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savetechnicalsupport1' AND status = 'Active' ");

                                                                    $row_technicalsupport1_lists = mysqli_fetch_assoc($technicalsupport1lists);
                                                                    $technicalsupport1id = $row_technicalsupport1_lists["id"];
                                                                    $technicalsupport1idnumber = $row_technicalsupport1_lists["idnumber"];
                                                                    $technicalsupport1firstname = $row_technicalsupport1_lists["firstname"];
                                                                    $technicalsupport1middlename = $row_technicalsupport1_lists["middlename"];
                                                                    $technicalsupport1lastname = $row_technicalsupport1_lists["lastname"];
                                                                    $technicalsupport1electionid = $row_technicalsupport1_lists["electionid"];
                                                                    $technicalsupport1position = $row_technicalsupport1_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$technicalsupport1electionid', '$technicalsupport1position', '$technicalsupport1idnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $technicalsupport1query)) {
                                                                // }

                                                                if ($savetechnicalsupport2 == "None") {
                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$voter_electionid', 'Technical Support', 'None')");
                                                                } else {
                                                                    $technicalsupport2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$savetechnicalsupport2' AND status = 'Active' ");

                                                                    $row_technicalsupport2_lists = mysqli_fetch_assoc($technicalsupport2lists);
                                                                    $technicalsupport2id = $row_technicalsupport2_lists["id"];
                                                                    $technicalsupport2idnumber = $row_technicalsupport2_lists["idnumber"];
                                                                    $technicalsupport2firstname = $row_technicalsupport2_lists["firstname"];
                                                                    $technicalsupport2middlename = $row_technicalsupport2_lists["middlename"];
                                                                    $technicalsupport2lastname = $row_technicalsupport2_lists["lastname"];
                                                                    $technicalsupport2electionid = $row_technicalsupport2_lists["electionid"];
                                                                    $technicalsupport2position = $row_technicalsupport2_lists["position"];

                                                                    mysqli_query($connections, "INSERT INTO votestbl (voteridnumber, electionid, position, candidatevoted) VALUES ('$session_id_number', '$technicalsupport2electionid', '$technicalsupport2position', '$technicalsupport2idnumber')");
                                                                }


                                                                // if (mysqli_query($connections, $technicalsupport2query)) {
                                                                // }

                                                                if (mysqli_query($connections, "UPDATE voterstbl SET status = '1' WHERE idnumber='$session_id_number' ")) {
                                                                    // $response['status'] = 'success';
                                                                    // $response['message'] = 'You have voted succesfully! Thank you for voting!';
                                                                    echo "<script>alert('You have voted succesfully! Thank you for voting!');</script>";
                                                                    echo "<script>setTimeout(function() { window.location.href = 'logout.php'; }, 500);</script>";
                                                                }
                                                                // header('Location: logout.php');
                                                            } else {
                                                                // $response['status'] = 'error';
                                                                // $response['message'] = 'No Technical Support2 Selected';
                                                                echo "<script>alert('Error: No Technical Support 2 Selected');</script>";
                                                            }
                                                        } else {
                                                            // $response['status'] = 'error';
                                                            // $response['message'] = 'No Technical Support1 Selected';
                                                            echo "<script>alert('Error: No Technical Support 1 Selected');</script>";
                                                        }
                                                    } else {
                                                        // $response['status'] = 'error';
                                                        // $response['message'] = 'No Layout Artist 2 Selected';
                                                        echo "<script>alert('Error: No Layout Artist 2 Selected');</script>";
                                                    }
                                                } else {
                                                    // $response['status'] = 'error';
                                                    // $response['message'] = 'No Layout Artist 1 Selected';
                                                    echo "<script>alert('Error: No Layout 1 Artist Selected');</script>";
                                                }
                                            } else {
                                                // $response['status'] = 'error';
                                                // $response['message'] = 'No Business Manager Selected';
                                                echo "<script>alert('Error: No Business Manager Selected');</script>";
                                            }
                                        } else {
                                            // $response['status'] = 'error';
                                            // $response['message'] = 'No P.I.O. 2 Selected';
                                            echo "<script>alert('Error: No P.I.O. 2 Selected');</script>";
                                        }
                                    } else {
                                        // $response['status'] = 'error';
                                        // $response['message'] = 'No P.I.O. 1 Selected';
                                        echo "<script>alert('Error: No P.I.O. 1 Selected');</script>";
                                    }
                                } else {
                                    // $response['status'] = 'error';
                                    // $response['message'] = 'No Assistant Auditor Selected';
                                    echo "<script>alert('Error: No Assistant Auditor Selected');</script>";
                                }
                            } else {
                                // $response['status'] = 'error';
                                // $response['message'] = 'No Auditor Selected';
                                echo "<script>alert('Error: No Auditor Selected');</script>";
                            }
                        } else {
                            // $response['status'] = 'error';
                            // $response['message'] = 'No Assistant Treasurer Selected';
                            echo "<script>alert('Error: No Assistant Treasurer Selected');</script>";
                        }
                    } else {
                        // $response['status'] = 'error';
                        // $response['message'] = 'No Treasurer Selected';
                        echo "<script>alert('Error: No Treasurer Selected');</script>";
                    }
                } else {
                    // $response['status'] = 'error';
                    // $response['message'] = 'No Assistant Secretary Selected';
                    echo "<script>alert('Error: No Assistant Secretary Selected');</script>";
                }
            } else {
                // $response['status'] = 'error';
                // $response['message'] = 'No Secretary Selected';
                echo "<script>alert('Error: No Secretary Selected');</script>";
            }
        } else {
            // $response['status'] = 'error';
            // $response['message'] = 'No Vice President Selected';
            echo "<script>alert('Error: No Vice President Selected');</script>";
        }
    } else {
        // $response['status'] = 'error';
        // $response['message'] = 'No President Selected' . 'Check President: ' . $savepresident;
        echo "<script>alert('Error: No President Selected');</script>";
    }


    // echo json_encode($response);
    // exit;
}



?>

<br>
<!-- <h1>Submit Vote</h1> -->
<!-- <h3 class="text-center bgmainblue text-white sticky-top py-2" style="z-index: 1;">Submit Vote</h3> -->
<div class=" container px-5">
    <form id="voteForm" method="POST">
        <?php
        if (isset($_GET['president'])) {
            // echo $_GET['president'];
            $president = $_GET['president'];

            if ($president == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">President:</h6>
                    <p class="mb-0"><?php echo $president; ?></p>
                    <input type="hidden" id="president" name="president" value="<?php echo $president; ?>">
                </div>
                <?php
            } else {
                $presidentlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$president' AND status = 'Active' ");
                $countpresident = mysqli_num_rows($presidentlists);


                if ($countpresident > 0) {
                    while ($row_president_lists = mysqli_fetch_assoc($presidentlists)) {


                        $presidentid = $row_president_lists["id"];
                        $presidentidnumber = $row_president_lists["idnumber"];
                        $presidentfirstname = $row_president_lists["firstname"];
                        $presidentmiddlename = $row_president_lists["middlename"];
                        $presidentlastname = $row_president_lists["lastname"];
                        $presidentelectionid = $row_president_lists["electionid"];
                        $presidentposition = $row_president_lists["position"];

                        $presidentname = ucfirst($presidentfirstname) . " " . ucfirst($presidentmiddlename[0]) . ". " . ucfirst($presidentlastname);

                ?>

                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">President:</h6>
                            <p class="mb-0"><?php echo $presidentname; ?></p>
                            <input type="hidden" id="president" name="president" value="<?php echo $presidentidnumber; ?>">
                        </div>

        <?php
                    }
                }
            }
        }
        ?>



        <?php
        if (isset($_GET['vicepresident'])) {
            // echo $_GET['vicepresident'];
            $vicepresident = $_GET['vicepresident'];

            if ($vicepresident == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Vice President:</h6>
                    <p class="mb-0"><?php echo $vicepresident; ?></p>
                    <input type="hidden" id="vicepresident" name="vicepresident" value="<?php echo $vicepresident; ?>">
                </div>
                <?php
            } else {
                $vicepresidentlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$vicepresident' AND status = 'Active' ");
                $countvicepresident = mysqli_num_rows($vicepresidentlists);


                if ($countvicepresident > 0) {
                    while ($row_vicepresident_lists = mysqli_fetch_assoc($vicepresidentlists)) {


                        $vicepresidentid = $row_vicepresident_lists["id"];
                        $vicepresidentidnumber = $row_vicepresident_lists["idnumber"];
                        $vicepresidentfirstname = $row_vicepresident_lists["firstname"];
                        $vicepresidentmiddlename = $row_vicepresident_lists["middlename"];
                        $vicepresidentlastname = $row_vicepresident_lists["lastname"];
                        $vicepresidentelectionid = $row_vicepresident_lists["electionid"];
                        $vicepresidentposition = $row_vicepresident_lists["position"];

                        $vicepresidentname = ucfirst($vicepresidentfirstname) . " " . ucfirst($vicepresidentmiddlename[0]) . ". " . ucfirst($vicepresidentlastname);
                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Vice President:</h6>
                            <p class="mb-0"><?php echo $vicepresidentname; ?></p>
                            <input type="hidden" id="vicepresident" name="vicepresident" value="<?php echo $vicepresidentidnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>



        <?php
        if (isset($_GET['secretary'])) {
            // echo $_GET['secretary'];
            $secretary = $_GET['secretary'];
            if ($secretary == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Secretary:</h6>
                    <p class="mb-0"><?php echo $secretary; ?></p>
                    <input type="hidden" id="secretary" name="secretary" value="<?php echo $secretary; ?>">
                </div>
                <?php
            } else {

                $secretarylists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$secretary' AND status = 'Active' ");
                $countsecretary = mysqli_num_rows($secretarylists);


                if ($countsecretary > 0) {
                    while ($row_secretary_lists = mysqli_fetch_assoc($secretarylists)) {


                        $secretaryid = $row_secretary_lists["id"];
                        $secretaryidnumber = $row_secretary_lists["idnumber"];
                        $secretaryfirstname = $row_secretary_lists["firstname"];
                        $secretarymiddlename = $row_secretary_lists["middlename"];
                        $secretarylastname = $row_secretary_lists["lastname"];
                        $secretaryelectionid = $row_secretary_lists["electionid"];
                        $secretaryposition = $row_secretary_lists["position"];

                        $secretaryname = ucfirst($secretaryfirstname) . " " . ucfirst($secretarymiddlename[0]) . ". " . ucfirst($secretarylastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Secretary:</h6>
                            <p class="mb-0"><?php echo $secretaryname; ?></p>
                            <input type="hidden" id="secretary" name="secretary" value="<?php echo $secretaryidnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>




        <?php

        if (isset($_GET['assistantsecretary'])) {
            // echo $_GET['assistantsecretary'];
            $assistantsecretary = $_GET['assistantsecretary'];

            if ($assistantsecretary == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Assistant Secretary:</h6>
                    <p class="mb-0"><?php echo $assistantsecretary; ?></p>
                    <input type="hidden" id="assistantsecretary" name="assistantsecretary" value="<?php echo $assistantsecretary; ?>">
                </div>
                <?php
            } else {
                $assistantsecretarylists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$assistantsecretary' AND status = 'Active' ");
                $countassistantsecretary = mysqli_num_rows($assistantsecretarylists);


                if ($countassistantsecretary > 0) {
                    while ($row_assistantsecretary_lists = mysqli_fetch_assoc($assistantsecretarylists)) {


                        $assistantsecretaryid = $row_assistantsecretary_lists["id"];
                        $assistantsecretaryidnumber = $row_assistantsecretary_lists["idnumber"];
                        $assistantsecretaryfirstname = $row_assistantsecretary_lists["firstname"];
                        $assistantsecretarymiddlename = $row_assistantsecretary_lists["middlename"];
                        $assistantsecretarylastname = $row_assistantsecretary_lists["lastname"];
                        $assistantsecretaryelectionid = $row_assistantsecretary_lists["electionid"];
                        $assistantsecretaryposition = $row_assistantsecretary_lists["position"];

                        $assistantsecretaryname = ucfirst($assistantsecretaryfirstname) . " " . ucfirst($assistantsecretarymiddlename[0]) . ". " . ucfirst($assistantsecretarylastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Assistant Secretary:</h6>
                            <p class="mb-0"><?php echo $assistantsecretaryname; ?></p>
                            <input type="hidden" id="assistantsecretary" name="assistantsecretary" value="<?php echo $assistantsecretaryidnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>



        <?php

        if (isset($_GET['treasurer'])) {
            // echo $_GET['treasurer'];
            $treasurer = $_GET['treasurer'];

            if ($treasurer == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Treasurer:</h6>
                    <p class="mb-0"><?php echo $treasurer; ?></p>
                    <input type="hidden" id="treasurer" name="treasurer" value="<?php echo $treasurer; ?>">
                </div>
                <?php
            } else {
                $treasurerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$treasurer' AND status = 'Active' ");
                $counttreasurer = mysqli_num_rows($treasurerlists);


                if ($counttreasurer > 0) {
                    while ($row_treasurer_lists = mysqli_fetch_assoc($treasurerlists)) {


                        $treasurerid = $row_treasurer_lists["id"];
                        $treasureridnumber = $row_treasurer_lists["idnumber"];
                        $treasurerfirstname = $row_treasurer_lists["firstname"];
                        $treasurermiddlename = $row_treasurer_lists["middlename"];
                        $treasurerlastname = $row_treasurer_lists["lastname"];
                        $treasurerelectionid = $row_treasurer_lists["electionid"];
                        $treasurerposition = $row_treasurer_lists["position"];

                        $treasurername = ucfirst($treasurerfirstname) . " " . ucfirst($treasurermiddlename[0]) . ". " . ucfirst($treasurerlastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Treasurer:</h6>
                            <p class="mb-0"><?php echo $treasurername; ?></p>
                            <input type="hidden" id="treasurer" name="treasurer" value="<?php echo $treasureridnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>



        <?php

        if (isset($_GET['assistanttreasurer'])) {
            // echo $_GET['assistanttreasurer'];
            $assistanttreasurer = $_GET['assistanttreasurer'];

            if ($assistanttreasurer == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Assistant Treasurer:</h6>
                    <p class="mb-0"><?php echo $assistanttreasurer; ?></p>
                    <input type="hidden" id="assistanttreasurer" name="assistanttreasurer" value="<?php echo $assistanttreasurer; ?>">
                </div>
                <?php
            } else {
                $assistanttreasurerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$assistanttreasurer' AND status = 'Active' ");
                $countassistanttreasurer = mysqli_num_rows($assistanttreasurerlists);


                if ($countassistanttreasurer > 0) {
                    while ($row_assistanttreasurer_lists = mysqli_fetch_assoc($assistanttreasurerlists)) {


                        $assistanttreasurerid = $row_assistanttreasurer_lists["id"];
                        $assistanttreasureridnumber = $row_assistanttreasurer_lists["idnumber"];
                        $assistanttreasurerfirstname = $row_assistanttreasurer_lists["firstname"];
                        $assistanttreasurermiddlename = $row_assistanttreasurer_lists["middlename"];
                        $assistanttreasurerlastname = $row_assistanttreasurer_lists["lastname"];
                        $assistanttreasurerelectionid = $row_assistanttreasurer_lists["electionid"];
                        $assistanttreasurerposition = $row_assistanttreasurer_lists["position"];

                        $assistanttreasurername = ucfirst($assistanttreasurerfirstname) . " " . ucfirst($assistanttreasurermiddlename[0]) . ". " . ucfirst($assistanttreasurerlastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Assistant Treasurer:</h6>
                            <p class="mb-0"><?php echo $assistanttreasurername; ?></p>
                            <input type="hidden" id="assistanttreasurer" name="assistanttreasurer" value="<?php echo $assistanttreasureridnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>



        <?php

        if (isset($_GET['auditor'])) {
            // echo $_GET['auditor'];
            $auditor = $_GET['auditor'];

            if ($auditor == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Auditor:</h6>
                    <p class="mb-0"><?php echo $auditor; ?></p>
                    <input type="hidden" id="auditor" name="auditor" value="<?php echo $auditor; ?>">
                </div>
                <?php
            } else {
                $auditorlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$auditor' AND status = 'Active' ");
                $countauditor = mysqli_num_rows($auditorlists);


                if ($countauditor > 0) {
                    while ($row_auditor_lists = mysqli_fetch_assoc($auditorlists)) {


                        $auditorid = $row_auditor_lists["id"];
                        $auditoridnumber = $row_auditor_lists["idnumber"];
                        $auditorfirstname = $row_auditor_lists["firstname"];
                        $auditormiddlename = $row_auditor_lists["middlename"];
                        $auditorlastname = $row_auditor_lists["lastname"];
                        $auditorelectionid = $row_auditor_lists["electionid"];
                        $auditorposition = $row_auditor_lists["position"];

                        $auditorname = ucfirst($auditorfirstname) . " " . ucfirst($auditormiddlename[0]) . ". " . ucfirst($auditorlastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Auditor:</h6>
                            <p class="mb-0"><?php echo $auditorname; ?></p>
                            <input type="hidden" id="auditor" name="auditor" value="<?php echo $auditoridnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>



        <?php

        if (isset($_GET['assistantauditor'])) {
            // echo $_GET['assistantauditor'];
            $assistantauditor = $_GET['assistantauditor'];

            if ($assistantauditor == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Assistant Auditor:</h6>
                    <p class="mb-0"><?php echo $assistantauditor; ?></p>
                    <input type="hidden" id="assistantauditor" name="assistantauditor" value="<?php echo $assistantauditor; ?>">
                </div>
                <?php
            } else {
                $assistantauditorlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$assistantauditor' AND status = 'Active' ");
                $countassistantauditor = mysqli_num_rows($assistantauditorlists);


                if ($countassistantauditor > 0) {
                    while ($row_assistantauditor_lists = mysqli_fetch_assoc($assistantauditorlists)) {


                        $assistantauditorid = $row_assistantauditor_lists["id"];
                        $assistantauditoridnumber = $row_assistantauditor_lists["idnumber"];
                        $assistantauditorfirstname = $row_assistantauditor_lists["firstname"];
                        $assistantauditormiddlename = $row_assistantauditor_lists["middlename"];
                        $assistantauditorlastname = $row_assistantauditor_lists["lastname"];
                        $assistantauditorelectionid = $row_assistantauditor_lists["electionid"];
                        $assistantauditorposition = $row_assistantauditor_lists["position"];

                        $assistantauditorname = ucfirst($assistantauditorfirstname) . " " . ucfirst($assistantauditormiddlename[0]) . ". " . ucfirst($assistantauditorlastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Assistant Auditor:</h6>
                            <p class="mb-0"><?php echo $assistantauditorname; ?></p>
                            <input type="hidden" id="assistantauditor" name="assistantauditor" value="<?php echo $assistantauditoridnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>



        <div class="mb-3">

            <?php
            if (isset($_GET['pio1'])) {
                // echo $_GET['pio1'];
                $pio1 = $_GET['pio1'];

                if ($pio1 == "None") {
            ?>
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0 me-2">P.I.O. 1:</h6>
                        <p class="mb-0"><?php echo $pio1; ?></p>
                        <input type="hidden" id="pio1" name="pio1" value="<?php echo $pio1; ?>">
                    </div>
                    <?php
                } else {
                    $pio1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$pio1' AND status = 'Active' ");
                    $countpio1 = mysqli_num_rows($pio1lists);


                    if ($countpio1 > 0) {
                        while ($row_pio1_lists = mysqli_fetch_assoc($pio1lists)) {


                            $pio1id = $row_pio1_lists["id"];
                            $pio1idnumber = $row_pio1_lists["idnumber"];
                            $pio1firstname = $row_pio1_lists["firstname"];
                            $pio1middlename = $row_pio1_lists["middlename"];
                            $pio1lastname = $row_pio1_lists["lastname"];
                            $pio1electionid = $row_pio1_lists["electionid"];
                            $pio1position = $row_pio1_lists["position"];

                            $pio1name = ucfirst($pio1firstname) . " " . ucfirst($pio1middlename[0]) . ". " . ucfirst($pio1lastname);

                    ?>
                            <div class="d-flex align-items-center">
                                <h6 class=" mb-0 me-2">P.I.O. 1:</h6>
                                <p class="mb-0">1. <?php echo $pio1name; ?></p>
                                <input type="hidden" id="pio1" name="pio1" value="<?php echo $pio1idnumber; ?>">
                            </div>




                    <?php
                        }
                    }
                }
            }

            if (isset($_GET['pio2'])) {
                // echo $_GET['pio2'];
                $pio2 = $_GET['pio2'];

                if ($pio2 == "None") {
                    ?>
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0 me-2">P.I.O. 2:</h6>
                        <p class="mb-0"><?php echo $pio2; ?></p>
                        <input type="hidden" id="pio2" name="pio2" value="<?php echo $pio2; ?>">
                    </div>
                    <?php
                } else {
                    $pio2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$pio2' AND status = 'Active' ");
                    $countpio2 = mysqli_num_rows($pio2lists);


                    if ($countpio2 > 0) {
                        while ($row_pio2_lists = mysqli_fetch_assoc($pio2lists)) {


                            $pio2id = $row_pio2_lists["id"];
                            $pio2idnumber = $row_pio2_lists["idnumber"];
                            $pio2firstname = $row_pio2_lists["firstname"];
                            $pio2middlename = $row_pio2_lists["middlename"];
                            $pio2lastname = $row_pio2_lists["lastname"];
                            $pio2electionid = $row_pio2_lists["electionid"];
                            $pio2position = $row_pio2_lists["position"];

                            $pio2name = ucfirst($pio2firstname) . " " . ucfirst($pio2middlename[0]) . ". " . ucfirst($pio2lastname);

                    ?>
                            <div class="d-flex align-items-center">
                                <h6 class=" mb-0 me-2">P.I.O. 2:</h6>
                                <p class="mb-0"><?php echo $pio2name; ?></p>
                                <input type="hidden" id="pio2" name="pio2" value="<?php echo $pio2idnumber; ?>">
                            </div>
            <?php
                        }
                    }
                }
            }
            ?>
        </div>


        <?php

        if (isset($_GET['businessmanager'])) {
            // echo $_GET['businessmanager'];
            $businessmanager = $_GET['businessmanager'];

            if ($businessmanager == "None") {
        ?>
                <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0 me-2">Business Manager:</h6>
                    <p class="mb-0"><?php echo $businessmanager; ?></p>
                    <input type="hidden" id="businessmanager" name="businessmanager" value="<?php echo $businessmanager; ?>">
                </div>
                <?php
            } else {
                $businessmanagerlists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$businessmanager' AND status = 'Active' ");
                $countbusinessmanager = mysqli_num_rows($businessmanagerlists);


                if ($countbusinessmanager > 0) {
                    while ($row_businessmanager_lists = mysqli_fetch_assoc($businessmanagerlists)) {


                        $businessmanagerid = $row_businessmanager_lists["id"];
                        $businessmanageridnumber = $row_businessmanager_lists["idnumber"];
                        $businessmanagerfirstname = $row_businessmanager_lists["firstname"];
                        $businessmanagermiddlename = $row_businessmanager_lists["middlename"];
                        $businessmanagerlastname = $row_businessmanager_lists["lastname"];
                        $businessmanagerelectionid = $row_businessmanager_lists["electionid"];
                        $businessmanagerposition = $row_businessmanager_lists["position"];

                        $businessmanagername = ucfirst($businessmanagerfirstname) . " " . ucfirst($businessmanagermiddlename[0]) . ". " . ucfirst($businessmanagerlastname);

                ?>
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0 me-2">Business Manager:</h6>
                            <p class="mb-0"><?php echo $businessmanagername; ?></p>
                            <input type="hidden" id="businessmanager" name="businessmanager" value="<?php echo $businessmanageridnumber; ?>">
                        </div>
        <?php
                    }
                }
            }
        }
        ?>




        <div class="mb-3">

            <?php

            if (isset($_GET['layoutartist1'])) {
                // echo $_GET['layoutartist1'];
                $layoutartist1 = $_GET['layoutartist1'];

                if ($layoutartist1 == "None") {
            ?>
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0 me-2">Layout Artist 1:</h6>
                        <p class="mb-0"><?php echo $layoutartist1; ?></p>
                        <input type="hidden" id="layoutartist1" name="layoutartist1" value="<?php echo $layoutartist1; ?>">
                    </div>
                    <?php
                } else {
                    $layoutartist1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$layoutartist1' AND status = 'Active' ");
                    $countlayoutartist1 = mysqli_num_rows($layoutartist1lists);


                    if ($countlayoutartist1 > 0) {
                        while ($row_layoutartist1_lists = mysqli_fetch_assoc($layoutartist1lists)) {


                            $layoutartist1id = $row_layoutartist1_lists["id"];
                            $layoutartist1idnumber = $row_layoutartist1_lists["idnumber"];
                            $layoutartist1firstname = $row_layoutartist1_lists["firstname"];
                            $layoutartist1middlename = $row_layoutartist1_lists["middlename"];
                            $layoutartist1lastname = $row_layoutartist1_lists["lastname"];
                            $layoutartist1electionid = $row_layoutartist1_lists["electionid"];
                            $layoutartist1position = $row_layoutartist1_lists["position"];

                            $layoutartist1name = ucfirst($layoutartist1firstname) . " " . ucfirst($layoutartist1middlename[0]) . ". " . ucfirst($layoutartist1lastname);

                    ?>
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-2">Layout Artist 1:</h6>
                                <p class="mb-0"><?php echo $layoutartist1name; ?></p>
                                <input type="hidden" id="layoutartist1" name="layoutartist1" value="<?php echo $layoutartist1idnumber; ?>">
                            </div>
                    <?php
                        }
                    }
                }
            }

            if (isset($_GET['layoutartist2'])) {
                // echo $_GET['layoutartist2'];
                $layoutartist2 = $_GET['layoutartist2'];

                if ($layoutartist2 == "None") {
                    ?>
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0 me-2">Layout Artist 2:</h6>
                        <p class="mb-0"><?php echo $layoutartist2; ?></p>
                        <input type="hidden" id="layoutartist2" name="layoutartist2" value="<?php echo $layoutartist2; ?>">
                    </div>
                    <?php
                } else {
                    $layoutartist2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$layoutartist2' AND status = 'Active' ");
                    $countlayoutartist2 = mysqli_num_rows($layoutartist2lists);


                    if ($countlayoutartist2 > 0) {
                        while ($row_layoutartist2_lists = mysqli_fetch_assoc($layoutartist2lists)) {


                            $layoutartist2id = $row_layoutartist2_lists["id"];
                            $layoutartist2idnumber = $row_layoutartist2_lists["idnumber"];
                            $layoutartist2firstname = $row_layoutartist2_lists["firstname"];
                            $layoutartist2middlename = $row_layoutartist2_lists["middlename"];
                            $layoutartist2lastname = $row_layoutartist2_lists["lastname"];
                            $layoutartist2electionid = $row_layoutartist2_lists["electionid"];
                            $layoutartist2position = $row_layoutartist2_lists["position"];

                            $layoutartist2name = ucfirst($layoutartist2firstname) . " " . ucfirst($layoutartist2middlename[0]) . ". " . ucfirst($layoutartist2lastname);

                    ?>
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-2">Layout Artist 2:</h6>
                                <p class="mb-0"><?php echo $layoutartist2name; ?></p>
                                <input type="hidden" id="layoutartist2" name="layoutartist2" value="<?php echo $layoutartist2idnumber; ?>">
                            </div>
            <?php
                        }
                    }
                }
            }
            ?>
        </div>



        <div class="mb-3">

            <?php

            if (isset($_GET['technicalsupport1'])) {
                // echo $_GET['technicalsupport1'];
                $technicalsupport1 = $_GET['technicalsupport1'];

                if ($technicalsupport1 == "None") {
            ?>
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0 me-2">Technical Support 1:</h6>
                        <p class="mb-0"><?php echo $technicalsupport1; ?></p>
                        <input type="hidden" id="technicalsupport1" name="technicalsupport1" value="<?php echo $technicalsupport1; ?>">
                    </div>
                    <?php
                } else {
                    $technicalsupport1lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$technicalsupport1' AND status = 'Active' ");
                    $counttechnicalsupport1 = mysqli_num_rows($technicalsupport1lists);


                    if ($counttechnicalsupport1 > 0) {
                        while ($row_technicalsupport1_lists = mysqli_fetch_assoc($technicalsupport1lists)) {


                            $technicalsupport1id = $row_technicalsupport1_lists["id"];
                            $technicalsupport1idnumber = $row_technicalsupport1_lists["idnumber"];
                            $technicalsupport1firstname = $row_technicalsupport1_lists["firstname"];
                            $technicalsupport1middlename = $row_technicalsupport1_lists["middlename"];
                            $technicalsupport1lastname = $row_technicalsupport1_lists["lastname"];
                            $technicalsupport1electionid = $row_technicalsupport1_lists["electionid"];
                            $technicalsupport1position = $row_technicalsupport1_lists["position"];

                            $technicalsupport1name = ucfirst($technicalsupport1firstname) . " " . ucfirst($technicalsupport1middlename[0]) . ". " . ucfirst($technicalsupport1lastname);

                    ?>
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-2">Technical Support 1:</h6>
                                <p class="mb-0"><?php echo $technicalsupport1name; ?></p>
                                <input type="hidden" id="technicalsupport1" name="technicalsupport1" value="<?php echo $technicalsupport1idnumber; ?>">
                            </div>
                    <?php
                        }
                    }
                }
            }

            if (isset($_GET['technicalsupport2'])) {
                // echo $_GET['technicalsupport2'];
                $technicalsupport2 = $_GET['technicalsupport2'];

                if ($technicalsupport2 == "None") {
                    ?>
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0 me-2">Technical Support 2:</h6>
                        <p class="mb-0"><?php echo $technicalsupport2; ?></p>
                        <input type="hidden" id="technicalsupport2" name="technicalsupport2" value="<?php echo $technicalsupport2; ?>">
                    </div>
                    <?php
                } else {
                    $technicalsupport2lists = mysqli_query($connections, "SELECT * FROM candidatestbl WHERE idnumber = '$technicalsupport2' AND status = 'Active' ");
                    $counttechnicalsupport2 = mysqli_num_rows($technicalsupport2lists);


                    if ($counttechnicalsupport2 > 0) {
                        while ($row_technicalsupport2_lists = mysqli_fetch_assoc($technicalsupport2lists)) {


                            $technicalsupport2id = $row_technicalsupport2_lists["id"];
                            $technicalsupport2idnumber = $row_technicalsupport2_lists["idnumber"];
                            $technicalsupport2firstname = $row_technicalsupport2_lists["firstname"];
                            $technicalsupport2middlename = $row_technicalsupport2_lists["middlename"];
                            $technicalsupport2lastname = $row_technicalsupport2_lists["lastname"];
                            $technicalsupport2electionid = $row_technicalsupport2_lists["electionid"];
                            $technicalsupport2position = $row_technicalsupport2_lists["position"];

                            $technicalsupport2name = ucfirst($technicalsupport2firstname) . " " . ucfirst($technicalsupport2middlename[0]) . ". " . ucfirst($technicalsupport2lastname);

                    ?>
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-2">Technical Support 2:</h6>
                                <p class="mb-0"><?php echo $technicalsupport2name; ?></p>
                                <input type="hidden" id="technicalsupport2" name="technicalsupport2" value="<?php echo $technicalsupport2idnumber; ?>">
                            </div>
            <?php
                        }
                    }
                }
            }
            ?>

        </div>

        <button class="button-green mb-3" id="backButton" data-target="itvoteform.php">Back</button>
        <input type="submit" name="submit" class="button-green mb-3 float-end" value="Submit">
    </form>
</div>


<br>
<br>
<br>
<br>
<br>
<script src="../bins/jquery-3.7.1/jquery-3.7.1.min.js"></script> <!-- jQuery for offline -->
<script>
    $(document).ready(function() {

        // Function to update the submit button's data-target attribute
        function updateBackButtonUrl() {
            var president = $('#president').val();
            var vicePresident = $('#vicepresident').val();
            var secretary = $('#secretary').val();
            var assistantSecretary = $('#assistantsecretary').val();
            var treasurer = $('#treasurer').val();
            var assistantTreasurer = $('#assistanttreasurer').val();
            var auditor = $('#auditor').val();
            var assistantAuditor = $('#assistantauditor').val();
            var pio1 = $('#pio1').val();
            var pio2 = $('#pio2').val();
            var businessManager = $('#businessmanager').val();
            var layoutArtist1 = $('#layoutartist1').val();
            var layoutArtist2 = $('#layoutartist2').val();
            var technicalSupport1 = $('#technicalsupport1').val();
            var technicalSupport2 = $('#technicalsupport2').val();

            // Construct the new URL with selected values
            var targetUrl = 'itvoteform.php?president=' + encodeURIComponent(president) +
                '&vicepresident=' + encodeURIComponent(vicePresident) +
                '&secretary=' + encodeURIComponent(secretary) +
                '&assistantsecretary=' + encodeURIComponent(assistantSecretary) +
                '&treasurer=' + encodeURIComponent(treasurer) +
                '&assistanttreasurer=' + encodeURIComponent(assistantTreasurer) +
                '&auditor=' + encodeURIComponent(auditor) +
                '&assistantauditor=' + encodeURIComponent(assistantAuditor) +
                '&pio1=' + encodeURIComponent(pio1) +
                '&pio2=' + encodeURIComponent(pio2) +
                '&businessmanager=' + encodeURIComponent(businessManager) +
                '&layoutartist1=' + encodeURIComponent(layoutArtist1) +
                '&layoutartist2=' + encodeURIComponent(layoutArtist2) +
                '&technicalsupport1=' + encodeURIComponent(technicalSupport1) +
                '&technicalsupport2=' + encodeURIComponent(technicalSupport2);

            console.log("Before Click: " + targetUrl);
            // Update the data-target attribute of the submit button
            $('#backButton').data('target', targetUrl);
            console.log("After Click: " + targetUrl);
        }

        $('#backButton').click(function(e) {
            e.preventDefault(); // Prevent default button behavior
            updateBackButtonUrl();

            var target = $(this).data('target'); // Get target from data attribute

            // AJAX request to load content
            $.ajax({
                url: target,
                method: 'GET',
                success: function(data) {
                    // Load content into main area
                    $('main[role="main"]').html(data);
                    $('main[role="main"]').scrollTop(0); // Scroll to top
                },
                error: function() {
                    // Show error message
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });

        });



        // $('#votingForm').on('submit', function(e) {
        //     e.preventDefault(); // Prevent default form submission

        //     $.ajax({
        //         type: 'POST',
        //         url: 'submit.php',
        //         data: $(this).serialize(),
        //         success: function(response) {
        //             console.log(response);
        //         }
        //     });
        // });



        // $('#voteForm').on('submit', function(e) {
        //     e.preventDefault(); // Prevent default form submission
        //     var formData = $(this).serialize(); // Serialize form data

        //     $.ajax({
        //         url: 'submit.php', // Change this to your actual form processing URL if needed
        //         type: 'POST',
        //         data: formData,
        //         contentType: 'application/x-www-form-urlencoded; charset=UTF-8', // Correct contentType for serialized data
        //         processData: true, // Set to true since data is serialized
        //         success: function(response) {
        //             // console.log('Raw response received: ', response);
        //             try {
        //                 var res = JSON.parse(response);
        //                 console.log('Parsed response: ', res);
        //                 if (res.status === 'success') {
        //                     alert(res.message);
        //                     console.log('Redirecting to logout.php');
        //                     window.location.href = 'logout.php'; // Ensure the URL is correct
        //                 } else {
        //                     alert('Error: ' + res.message);
        //                 }
        //             } catch (e) {
        //                 alert('Error processing response.');
        //                 console.log('Error parsing response: ', e, response);
        //             }
        //         },
        //         error: function(xhr, status, error) {

        //             console.log('AJAX request failed.');
        //             console.log('Status: ' + status);
        //             console.log('Error: ' + error);
        //             console.log('Response Text: ' + xhr.responseText);
        //             console.log('Error submitting form: ', error);
        //             alert('Error adding candidate. Please try again.');
        //         }
        //     });
        // });








    });
</script>

<?php
include('bins/footer.php');
?>