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

$demo_response = [
    "lints" => [
        [
            "type" => "LintName/ID?",
            "severity" => 5,
            "message" => "Unexpected token",
            "location" => [
                "startLine" => 5,
                "endLine" => 5,
                "startColumn" => 10,
                "endColumn" => 15
            ]
        ],
        [
            "type" => "LintName/ID?",
            "severity" => 5,
            "message" => "Unexpected token",
            "location" => [
                "startLine" => 10,
                "endLine" => 10,
                "startColumn" => 20,
                "endColumn" => 25
            ]
        ]
    ]
];

header("Content-Type: application/json");
http_response_code(200);
echo json_encode($demo_response);
