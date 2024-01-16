<?php 
$conn = getConnection();

function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_akademik";

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("koneksi ke database error");
    }

    return $conn;
}

function getMahasiswa()
{
    $query = "SELECT mahasiswa.nim, mahasiswa.nama as nama_mahasiswa, prodi.nama as nama_prodi
    FROM mahasiswa
    JOIN prodi on mahasiswa.prodi_id = prodi.id";
    $conn = getConnection();
    $statement = $conn->prepare($query);
    $statement->execute();

    $result = $statement->get_result();

    $mahasiswa = $result->fetch_all(MYSQLI_ASSOC);

    return $mahasiswa;
}

function getProdi()
{
    $query = "SELECT prodi.id, prodi.nama as nama_prodi
    FROM prodi";
    $conn = getConnection();
    $statement = $conn->prepare($query);
    $statement->execute();

    $result = $statement->get_result();

    $prodi = $result->fetch_all(MYSQLI_ASSOC);

    return $prodi;
}

function insertMahasiswa()
{
    $conn = getConnection();
    $statement = $conn->prepare('INSERT INTO mahasiswa (nim, nama, prodi_id) VALUES (?, ?, ?)');
    $statement->bind_param('sss', $_POST['nim'], $_POST['nama'], $_POST['prodi_id']);
    $statement->execute();

    // redirect ke home.php
    header("Location: home.php");
    exit();
}

function insertProdi()
{
    $conn = getConnection();
    $statement = $conn->prepare('INSERT INTO prodi (nama) VALUES (?)');
    $statement->bind_param('s', $_POST['nama']);
    $statement->execute();

    // redirect ke home.php
    header("Location: home.php");
    exit();
}

function getMahasiswaByNIM() {
    $query = "SELECT mahasiswa.nim as mahasiswa_nim, prodi.id as prodi_id, mahasiswa.nama as nama_mahasiswa, prodi.nama as nama_prodi
    FROM mahasiswa
    JOIN prodi on mahasiswa.prodi_id = prodi.id
    WHERE mahasiswa.nim = ?";
    $conn = getConnection();
    $statement = $conn->prepare($query);
    $statement->bind_param('s', $_GET['nim']);
    $statement->execute();

    $result = $statement->get_result();

    $mahasiswa = $result->fetch_assoc();

    return $mahasiswa;
}

function getProdiById() {
    $query = "SELECT prodi.id as prodi_id, prodi.nama as nama_prodi
    FROM prodi
    WHERE prodi.id = ?";
    $conn = getConnection();
    $statement = $conn->prepare($query);
    $statement->bind_param('s', $_GET['id']);
    $statement->execute();

    $result = $statement->get_result();

    $prodi = $result->fetch_assoc();

    return $prodi;
}

function updateMahasiswa() {
        $conn = getConnection();
        $statement = $conn->prepare('UPDATE mahasiswa SET nama = ?, prodi_id = ? WHERE nim = ?');
        $statement->bind_param('sss', $_POST['nama'], $_POST['prodi_id'], $_POST['nim']);
        $statement->execute();

        // redirect ke home.php
        header("Location: home.php");
        exit();

}

function updateProdi() {
    $conn = getConnection();
    $statement = $conn->prepare('UPDATE prodi SET nama = ? WHERE id = ?');
    $statement->bind_param('ss', $_POST['nama'], $_POST['id']);
    $statement->execute();

    // redirect ke home.php
    header("Location: home.php");
    exit();
}

function deleteMahasiswa()
{
    $conn = getConnection();
    $statement = $conn->prepare('DELETE FROM mahasiswa WHERE nim = ?');
    $statement->bind_param('s', $_GET['nim']);
    $statement->execute();

    // redirect ke home.php
    header("Location: home.php");
    exit();
}

function deleteProdi()
{
    $conn = getConnection();
    $statement = $conn->prepare('DELETE FROM prodi WHERE id = ?');
    $statement->bind_param('s', $_GET['id']);
    $statement->execute();

    // redirect ke home.php
    header("Location: home.php");
    exit();
}
function registrasi($data) {
    global $conn;

    $username = mysqli_real_escape_string($conn, strtolower(trim($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);

    // Periksa apakah username sudah ada
    $check_query = "SELECT username FROM t_user WHERE username = ?";
    $check_statement = $conn->prepare($check_query);
    $check_statement->bind_param('s', $username);
    $check_statement->execute();
    $check_statement->store_result();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($check_statement->num_rows > 0) {

        // Username sudah ada, perbarui password
        $update_query = "UPDATE t_user SET password = ? WHERE username = ?";
        $update_statement = $conn->prepare($update_query);
        $update_statement->bind_param('ss', $hashed_password, $username);
        $update_statement->execute();

        if ($update_statement->affected_rows > 0) {
            echo "<script>
                    alert('Password berhasil diperbarui!');
                  </script>";
            return true;
        } else {
            echo "<script>
                    alert('Password gagal diperbarui, silakan coba lagi!');
                  </script>";
            return false;
        }
    } else {

        // Username tidak ada, silakan register
        $insert_query = "INSERT INTO t_user (username, password) VALUES (?, ?)";
        $insert_statement = $conn->prepare($insert_query);
        $insert_statement->bind_param('ss', $username, $hashed_password);
        $insert_statement->execute();

        if ($insert_statement->affected_rows > 0) {
            echo "<script>
                    alert('Register sukses!');
                  </script>";
            return true;
        } else {
            echo "<script>
                    alert('Register gagal, silakan coba lagi!');
                  </script>";
            return false;
        }
    }
}

function getPost()
{
    $query = "SELECT post.title as title_post, post.description
    FROM post";
    $conn = getConnection();
    $statement = $conn->prepare($query);
    $statement->execute();

    $result = $statement->get_result();

    $post = $result->fetch_all(MYSQLI_ASSOC);

    return $post;
}

?>