@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full"></div>
    </header>

    <main>
        <div class="lg:flex lg:flex-wrap -mx-3">
            <div class="lg:w-1/4 px-3">
                <ul class="side-nav fixed">
                    <li class="headline-lead">Table of Contents</li>
                    <li><a href="#typography">Typography</a></li>
                    <li><a href="#buttons">Buttons</a></li>
                    <li><a href="#modals">Modals</a></li>
                </ul>
            </div>
            <div class="lg:w-3/4 px-3">
                <div class="lg:w-full px-3 mb-16" id="typography">
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

                <div class="lg:w-full px-3 mb-16" id="buttons">
                    <h2>Buttons</h2>

                    <table class="lg:w-full">
                        <tbody>
                        <tr>
                            <td><code>.button</code></td>
                            <td><a href="" class="button">Button</a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-secondary</code></td>
                            <td><a href="" class="button btn-secondary">Button</a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-blue</code></td>
                            <td><a href="" class="button btn-blue">Button</a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-teal</code></td>
                            <td><a href="" class="button btn-teal">Button</a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-yellow</code></td>
                            <td><a href="" class="button btn-yellow">Button</a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-add</code></td>
                            <td><a href="" class="button btn-add">+</a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-large</code></td>
                            <td><a href="" class="button btn-large">Large Button</a></td>
                        </tr>
                        </tbody>
                    </table>

            </div>

                <div class="lg:w-full px-3 mb-16" id="modals">
                    <h2>Modals</h2>
                    <p>Since laravel comes with Twitter Bootstrap out of the box, we're going to utilize <a href="https://getbootstrap.com/docs/4.0/components/modal/" target="_blank">bootstrap's modal js library</a>.</p>
                    <p>To create a modal, all you'll need to do is wrap any element in a div with the modal classes. Then you'll set a data-target and data-toggle on a button. See the example below.</p>

                    <pre>
                        <code class="language-html" data-lang="html">
    &lt;!-- Button trigger modal --&gt;
    &lt;button type=&quot;button&quot; class=&quot;button btn-primary&quot; data-toggle=&quot;modal&quot; data-target=&quot;#exampleModal&quot;&gt;
        Click Me
    &lt;/button&gt;

    &lt;!-- Modal --&gt;
    &lt;div class=&quot;modal fade&quot; id=&quot;exampleModal&quot; tabindex=&quot;-1&quot; role=&quot;dialog&quot; aria-labelledby=&quot;exampleModalLabel&quot; aria-hidden=&quot;true&quot;&gt;
        &lt;div class=&quot;modal-dialog modal-dialog-centered&quot; role=&quot;document&quot;&gt;
            &lt;div class=&quot;modal-content&quot;&gt;
                &lt;div class=&quot;modal-header&quot;&gt;
                    &lt;h5 class=&quot;modal-title&quot; id=&quot;exampleModalLabel&quot;&gt;Modal title&lt;/h5&gt;
                    &lt;button type=&quot;button&quot; class=&quot;close&quot; data-dismiss=&quot;modal&quot; aria-label=&quot;Close&quot;&gt;
                        &lt;span aria-hidden=&quot;true&quot;&gt;&amp;times;&lt;/span&gt;
                    &lt;/button&gt;
                &lt;/div&gt;
                &lt;div class=&quot;modal-body&quot;&gt;
                    I'm a super cool modal pop up!
                &lt;/div&gt;
                &lt;div class=&quot;modal-footer&quot;&gt;
                    &lt;a href=&quot;&quot; class=&quot;button btn-blue&quot; data-dismiss=&quot;modal&quot;&gt;Close&lt;/a&gt;
                    &lt;a href=&quot;&quot; class=&quot;button&quot;&gt;Save&lt;/a&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
                        </code>
                    </pre>

                    <button type="button" class="button btn-primary" data-toggle="modal" data-target="#exampleModal">Click Me</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    I'm a super cool modal pop up!
                                </div>
                                <div class="modal-footer">
                                    <a href="" class="button btn-blue" data-dismiss="modal">Close</a>
                                    <a href="" class="button">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
