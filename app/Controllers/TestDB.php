<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        try {
            // Connect to the database
            $db = Database::connect();

            // Test a simple query
            $query = $db->query("SELECT GETDATE() AS CurrentTime");
            $result = $query->getRow();

            echo "✅ Connected to SQL Server successfully!<br>";
            echo "Current SQL Server time: " . $result->CurrentTime;
        } catch (\Exception $e) {
            // Show connection error
            echo "❌ Connection failed: " . $e->getMessage();
        }
    }
}
