<?php
/*
 * Poggit-Lint
 *
 * Copyright (C) 2024 Poggit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// Read and validate the input code.
$input = file_get_contents("php://input");
if($input === false) {
    http_response_code(400);
    echo "Failed to read input";
    exit;
}

// Create a temporary file in the systems temp dir.
$temp_file = tempnam(sys_get_temp_dir(), 'lint');
if($temp_file === false) {
    http_response_code(500);
    echo "Failed to create temp file";
    exit;
}

file_put_contents($temp_file, $input);

// Run the linter
$output = [];
exec("php -l " . escapeshellarg($temp_file), $output, $exit_code);

// Remove the temp file
unlink($temp_file);

// Removes the first line of the output (empty) and create the string response.
$output = trim(implode("\n", $output));

// Replace file path with "{POGGIT_LINT_FILE}"
$output = str_replace($temp_file, "{POGGIT_LINT_FILE}", $output);

if($exit_code === 0) $output = "OK";

header("Content-Type: application/json");
http_response_code(200);
echo json_encode([
    "php" => PHP_VERSION_ID,
    "lint" => $output
]);
