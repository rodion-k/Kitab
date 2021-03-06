<?php

declare(strict_types=1);

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2017, Hoa community. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace Kitab\Compiler\Target\DocTest\CodeBlockHandler;

/**
 * Define a code block handler.
 *
 * A code handler has a name, matches only some specific types, and is able to
 * compile a code block content into a test case body.
 *
 * For a concrete implementation example, see the
 * `Kitab\Compiler\Target\DocTest\CodeBlockHandler\Php`.
 */
interface Definition
{
    /**
     * The name of a handler is used to differentiate test
     * cases generated by different handlers.
     *
     * Be careful that these names can be used as PHP identifiers.
     */
    public function getDefinitionName(): string;

    /**
     * Check whether a code block might be compiled by this handler into a
     * test case body based on its type.
     */
    public function mightHandleCodeBlock(string $codeBlockType): bool;

    /**
     * The core of a handler: Compile a code block content into a test case
     * body.
     *
     * The test case body must not include the test case “definition” (like
     * `public function …`), nor its name, only the body.
     *
     * The code block type can be a single identifier, a list of identifiers
     * with or without arguments. This is the raw code block type. It is up to
     * the handler to parse it. The code block content is also the raw value
     * from the documentation. No transformation is applied.
     */
    public function compileToTestCaseBody(string $codeBlockType, string $codeBlockContent): string;
}
