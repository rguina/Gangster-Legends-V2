<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	if (
		isset($_POST["host"]) && 
		isset($_POST["user"]) && 
		isset($_POST["pass"]) && 
		isset($_POST["database"]) 
	) {

		try {
			$options = array(
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			$test = NEW PDO("mysql:host=" . $_POST["host"] . ";dbname=" . $_POST["database"], $_POST["user"], $_POST["pass"], $options);
			$test->exec("SET NAMES utf8mb4");

			$configFile = '<?php

			    $config = array();

			    $config["debug"] = 0;

			    $config["db"] = array(
			        "host" => "'.addslashes($_POST["host"]).'", 
			        "database" => "'.addslashes($_POST["database"]).'",
			        "user" => "'.addslashes($_POST["user"]).'",
			        "pass" => "'.addslashes($_POST["pass"]).'"
			    );

			?>';

			file_put_contents("../config.php", str_replace("	", "", $configFile));

		} catch (Exception $e) {
			echo "failed<br><strong>Error:</strong> " . $e->getMessage();
		}

	}

	require "../config.php";

	try {
		include "../dbconn.php";
		success(1, "Database Login");
		echo "<ol><li>Config file created!</li></ol>";
	} catch (Exception $e) {
		failed(1, "Database Login");
		echo '<div class="alert alert-danger"><strong>Connection Error:</strong> ' . $e->getMessage() . '</div>';

		$host = isset($_POST["host"]) ? htmlspecialchars($_POST["host"]) : "localhost";
		$user = isset($_POST["user"]) ? htmlspecialchars($_POST["user"]) : "";
		$pass = isset($_POST["pass"]) ? htmlspecialchars($_POST["pass"]) : "";
		$database = isset($_POST["database"]) ? htmlspecialchars($_POST["database"]) : "";

		echo '
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="post" action="#">
						<div class="form-group">
							<label for="exampleInputEmail1">Hostname</label>
							<input type="text" class="form-control" name="host" value="' . $host . '">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" class="form-control" name="user" value="' . $user . '">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" class="form-control" name="pass" value="' . $pass . '">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Database</label>
							<input type="text" class="form-control" name="database" value="' . $database . '">
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-success">Test Connection</button>
						</div>

					</form>
				</div>
			</div>
		';

	}