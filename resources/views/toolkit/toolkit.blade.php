@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="w-full">
            <p class="headline-lead">Internal Toolkit</p>
            <p>Documentation and examples for our most used styles</p>
        </div>
    </header>

    <main>
        <div class="-mx-3">
            <div class="lg:w-full px-3 mb-16">
                <h2 class="text-gray-500 mb-3">Typography</h2>

                <table class="lg:w-full">
                    <tbody>
                        <tr>
                            <td><code>&lt;h1&gt; or .h1</code></td>
                            <td><h1>I'm an H1</h1></td>
                        </tr>
                        <tr>
                            <td><code>&lt;h2&gt; or .h2</code></td>
                            <td><h2>Headline 2</h2></td>
                        </tr>
                        <tr>
                            <td><code>&lt;h3&gt; or .h3</code></td>
                            <td><h3>Headline 3</h3></td>
                        </tr>
                        <tr>
                            <td><code>&lt;h4&gt; or .h4</code></td>
                            <td><h4>Headline 4</h4></td>
                        </tr>
                        <tr>
                            <td><code>&lt;h5&gt; or .h5</code></td>
                            <td><h5>Headline 5</h5></td>
                        </tr>
                        <tr>
                            <td><code>&lt;h6&gt; or .h6</code></td>
                            <td><h6>Headline 6</h6></td>
                        </tr>
                        <tr>
                            <td><code>.headline-lead</code></td>
                            <td><span class="headline-lead">This is a pre-headline.</span></td>
                        </tr>
                        <tr>
                            <td><code>&lt;a href&gt;</code></td>
                            <td><p>Chupa chups caramels pie. Pudding <a href="">toffee soufflé</a> cake muffin cupcake ice cream.</p></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="lg:w-full px-3 mb-16">
                <h2>Buttons</h2>

                <table class="lg:w-full">
                    <tbody>
                    <tr>
                        <td><code>.button</code></td>
                        <td><a href="" class="button">Button</a></a></td>
                    </tr>
                    <tr>
                        <td><code>.button.btn-secondary</code></td>
                        <td><a href="" class="button btn-secondary">Button</a></a></td>
                    </tr>
                    <tr>
                        <td><code>.button.btn-blue</code></td>
                        <td><a href="" class="button btn-blue">Button</a></a></td>
                    </tr>
                    <tr>
                        <td><code>.button.btn-teal</code></td>
                        <td><a href="" class="button btn-teal">Button</a></a></td>
                    </tr>
                    <tr>
                        <td><code>.button.btn-yellow</code></td>
                        <td><a href="" class="button btn-yellow">Button</a></a></td>
                    </tr>
                    <tr>
                        <td><code>.button.btn-add</code></td>
                        <td><a href="" class="button btn-add">+</a></td>
                    </tr>
                    <tr>
                        <td><code>.button.btn-large</code></td>
                        <td><a href="" class="button btn-large">Large Button</a></a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
@endsection
