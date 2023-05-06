<?php
include('./app/controllers/MessageController.php');
$messages = MessageController::list();
?>

<div class="container bg-light mt-5">
    <div class="row">
        <div class="col-12 border border-1 rounded border-opacity-75 shadow">
            <div class="row border-bottom align-items-center">
                <div class="col-12 d-flex justify-content-start footeropacity">
                    <i class="bi bi-database-add ms-1 dashboardIconSize"></i>
                    <h1 class="ms-2 display-5 text-uppercase">Messages</h1>

                </div>
            </div>

            <?php

            $headers = array(
                "Action",
                "Name",
                "Email",
                "Message",
                "Created At",
            );
            echo '<div class="row mx-1">';
            echo '<table class="table-light table-striped table-hover table-bordered border-dark rounded my-3">';
            echo '<thead>';
            echo '<tr>';
            foreach ($headers as $value) {
                echo '<th class="text-center">' . $value . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody class="footeropacity">';
            foreach ($messages as $message) {
                echo '<tr>';
                echo '
            <th scope="row" class="text-center">
                <form action="" method="post">
                    <input type="hidden" name="messageId" value="' . $message['id'] . '">
                        <button type="submit" name="deleteMessage" class="btn btn-danger ms-1 delete-button">
                            <i class="bi bi-trash3"></i>
                        </button>
                </form>
        </div>
            </th>';
                echo '
    <td class="text-center">' . $message["name"] . '</td>
    <td class="text-center">' . $message["email"] . '</td>
    <td class="">' . $message["message"] . '</td>
    <td class="text-center">' . $message["created_at"] . '</td>
    ';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            ?>

            <!-- Modal -->
            <!-- <div class="modal fade" id="deleteModal" name="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure about deleting that message?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirm-delete-button">Delete</button>
            </div>
        </div>
    </div>
</div> -->
         


            <?php
            if (isset($_POST['messageId'])) {
                $messageId = $_POST['messageId'];
                $response = Message::deleteMessage($messageId);
            }
            ?>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>