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

// '/poggit-lint/' is the path to the entry point of the application in the docker container, change if running locally.
const POGGIT_INSTALL_PATH = "/poggit-lint/"; // absolute path!

/** @noinspection PhpIncludeInspection */
include_once realpath(POGGIT_INSTALL_PATH) . "/entry.php";