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

$input = file_get_contents("php://input");
if($input === false) {
    http_response_code(400);
    echo "Failed to read input";
    exit;
}

$tokens = token_get_all($input);
foreach($tokens as &$token) {
    if(is_array($token)) $token[0] = token_name((int)$token[0]);
}

header("Content-Type: application/json");
http_response_code(200);
echo json_encode([
    "php" => PHP_VERSION_ID,
    "tokens" => $tokens
]);
