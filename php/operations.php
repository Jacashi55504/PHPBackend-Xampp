<?php
include('connection.php');

function createAuto($db, $marca, $modelo, $ano, $no_serie) {
    $stmt = $db->prepare("INSERT INTO autos (marca, modelo, ano, no_serie) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $marca, $modelo, $ano, $no_serie);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        return $stmt->insert_id;
    } else {
        return false;
    }
}

function readAutos($db) {
    $sql = "SELECT * FROM cliente_auto";
    $result = $db->query($sql);

    $arrAutos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrAutos[] = $row;
        }
    }
    return $arrAutos;
}

function updateAuto($db, $id, $marca, $modelo, $ano, $no_serie) {
    $stmt = $db->prepare("UPDATE autos SET marca = ?, modelo = ?, ano = ?, no_serie = ? WHERE id = ?");
    $stmt->bind_param("ssiii", $marca, $modelo, $ano, $no_serie, $id);
    $stmt->execute();
    
    return $stmt->affected_rows > 0;
}

function deleteAuto($db, $id) {
    $stmt = $db->prepare("DELETE FROM autos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    return $stmt->affected_rows > 0;
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'createAuto':
        $id = createAuto($db, $_POST['marca'], $_POST['modelo'], $_POST['ano'], $_POST['no_serie']);
        if ($id) {
            echo json_encode(["status" => "ok", "id" => $id]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to create auto"]);
        }
        break;
    case 'readAutos':
        $autos = readAutos($db);
        echo json_encode(["status" => "ok", "data" => $autos]);
        break;
    case 'updateAuto':
        $updated = updateAuto($db, $_POST['id'], $_POST['marca'], $_POST['modelo'], $_POST['ano'], $_POST['no_serie']);
        if ($updated) {
            echo json_encode(["status" => "ok"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update auto"]);
        }
        break;
    case 'deleteAuto':
        $id = $_POST['id'];
        $deleted = deleteAuto($db, $id);
        if ($deleted) {
            echo json_encode(["status" => "ok"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete auto"]);
        }
        break;
    default:
        echo json_encode(["status" => "error", "message" => "Invalid action"]);
        break;
}

// Cerrar la conexión si ya no es necesaria
$db->close();

