<?php
class crud {
    // Fungsi koneksi ke database
    public static function conect()
    {
        try {
            $con = new PDO('mysql:host=localhost;dbname=crudsystem', 'root', ''); // Sesuaikan dengan username dan password Anda
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Menambahkan mode pengecualian untuk debugging
            return $con;
        } catch (PDOException $error1) {
            die('Something went wrong, with your connection! ' . $error1->getMessage());
        } catch (Exception $error2) {
            die('Generic error! ' . $error2->getMessage());
        }
    }

    // Fungsi untuk mengambil data dari tabel 'crudtable' (misalnya untuk data pengguna)
    public static function SelectUsers()
    {
        $data = array();
        try {
            $p = crud::conect()->prepare('SELECT * FROM crudtable');
            $p->execute();
            $data = $p->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error fetching users: ' . $e->getMessage();
        }
        return $data;
    }

    // Fungsi untuk menghapus data dari tabel 'crudtable'
    public static function deleteUser($id)
    {
        try {
            $p = crud::conect()->prepare('DELETE FROM crudtable WHERE id=:id');
            $p->bindValue(':id', $id);
            $p->execute();
        } catch (PDOException $e) {
            echo 'Error deleting user: ' . $e->getMessage();
        }
    }

    // Fungsi untuk mengambil data dari tabel 'products' (produk)
    public static function SelectProducts()
    {
        $data = array();
        try {
            $p = crud::conect()->prepare('SELECT * FROM products');
            $p->execute();
            $data = $p->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error fetching products: ' . $e->getMessage();
        }
        return $data;
    }

    // Fungsi untuk menghapus data produk dari tabel 'products'
    public static function deleteProducts($id)
    {
        try {
            $p = crud::conect()->prepare('DELETE FROM products WHERE id=:id');
            $p->bindValue(':id', $id);
            $p->execute();
        } catch (PDOException $e) {
            echo 'Error deleting product: ' . $e->getMessage();
        }
    }
    public static function userDataPerId($id) {
        try {
            $pdo = self::conect();
            $stmt = $pdo->prepare("SELECT * FROM crudtable WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error fetching user by ID: ' . $e->getMessage();
        }
    }
    public static function insertProduct($name, $description, $price, $image) {
        $conn = self::conect();
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    
        // Bind parameter yang benar
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $price, PDO::PARAM_INT);
        $stmt->bindValue(4, $image, PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    public static function updateProduct($id, $name, $description, $price, $image) {
        $conn = self::conect();
        $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
    
        // Bind parameter yang benar
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $price, PDO::PARAM_INT);
        $stmt->bindValue(4, $image, PDO::PARAM_STR);
        $stmt->bindValue(5, $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
}
?>
