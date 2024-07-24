<?php
include("../admindashboard/bins/connections.php");

// Function to generate dropdown options
function generateDropdownOptions($connection, $position, $selectId, $disabled = false)
{
    $query = "SELECT * FROM candidatestbl WHERE position='$position' AND course='BSIT' AND status='Active'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $id = $data["idnumber"];
            $firstname = ucfirst($data["firstname"]);
            $middlename = ucfirst($data["middlename"][0]) . ".";
            $lastname = ucfirst($data["lastname"]);
            $name = "$firstname $middlename $lastname";

            echo "<option value='$id'>$name</option>";
        }
    } else {
        echo "<option value='1'>No record found</option>";
    }
}
?>
<div class="container px-5">
    <form method="POST">
        <div class="row">
            <?php
            $positions = [
                'President' => 'president',
                'Vice President' => 'vicepresident',
                'Secretary' => 'secretary',
                'Assistant Secretary' => 'assistantsecretary',
                'Treasurer' => 'treasurer',
                'Assistant Treasurer' => 'assistanttreasurer',
                'Auditor' => 'auditor',
                'Assistant Auditor' => 'assistantauditor',
                'P.I.O.' => ['pio1', 'pio2'],
                'Business Manager' => 'businessmanager',
                'Layout Artist' => ['layoutartist1', 'layoutartist2'],
                'Technical Support' => ['technicalsupport1', 'technicalsupport2']
            ];

            foreach ($positions as $position => $ids) {
                if (is_array($ids)) {
                    foreach ($ids as $index => $id) {
                        echo '<div class="col-md-6 mb-3">';
                        echo '<label for="' . $id . '" class="form-label">' . $position . ':</label>';
                        echo '<select class="form-select form-select-sm" id="' . $id . '"' . ($index ? ' disabled' : '') . '>';
                        echo '<option value="1">Select ' . $position . '</option>';
                        generateDropdownOptions($connections, $position, $id);
                        echo '</select>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-md-6 mb-3">';
                    echo '<label for="' . $ids . '" class="form-label">' . $position . ':</label>';
                    echo '<select class="form-select form-select-sm" id="' . $ids . '">';
                    echo '<option value="1">Select ' . $position . '</option>';
                    generateDropdownOptions($connections, $position, $ids);
                    echo '</select>';
                    echo '</div>';
                }
                echo '<hr><br>';
            }
            ?>
        </div>
        <button class="button-green submit-link mb-3 float-end" id="submitButton" data-target="submit.php">Submit</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../bins/jquery-3.7.1/jquery-3.7.1.min.js"></script> <!-- jQuery for offline -->

<script>
    $(document).ready(function() {
        function handleDropdownChange(primaryId, secondaryId) {
            $('#' + primaryId).change(function() {
                var selectedValue = $(this).val();
                $('#' + secondaryId).prop('disabled', false);
                $('#' + secondaryId + ' option').each(function() {
                    $(this).toggle($(this).val() != selectedValue);
                });
            });

            $('#' + secondaryId).change(function() {
                var selectedValue = $(this).val();
                $('#' + primaryId).prop('disabled', false);
                $('#' + primaryId + ' option').each(function() {
                    $(this).toggle($(this).val() != selectedValue);
                });
            });
        }

        handleDropdownChange('pio1', 'pio2');
        handleDropdownChange('layoutartist1', 'layoutartist2');
        handleDropdownChange('technicalsupport1', 'technicalsupport2');

        $('#submitButton').click(function(e) {
            e.preventDefault();
            var target = $(this).data('target');

            $.ajax({
                url: target,
                method: 'GET',
                success: function(data) {
                    $('main[role="main"]').html(data).scrollTop(0);
                },
                error: function() {
                    $('main[role="main"]').html('<p>Sorry, the content could not be loaded.</p>');
                }
            });
        });
    });
</script>