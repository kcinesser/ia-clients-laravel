@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full"></div>
    </header>

    <main>
        <div class="lg:flex lg:flex-wrap -mx-3">
            <div class="lg:w-1/4 px-3">
                <ul class="side-nav lg:fixed hidden lg:block">
                    <li class="headline-lead">Table of Contents</li>
                    <li><a href="#typography">Typography</a></li>
                    <li><a href="#buttons">Buttons</a></li>
                    <li><a href="#badges">Badges</a></li>
                    <li><a href="#modals">Modals</a></li>
                    <li><a href="#cards">Cards</a></li>
                </ul>
            </div>
            <div class="lg:w-3/4 px-3">
                <div class="lg:w-full px-3 mb-16" id="design-considerations">
                    <h2 class="mb-3">Design Considerations</h2>
                    <p>We are using the <a href="https://tailwindcss.com" target="_blank">TailwindCSS</a> framework as our starting point.</p>
                    <p>Each element should have a <strong>bottom margin of 1.25rem</strong> (or <code>mb-12</code> in class terms). The sidebar and main content areas should also have the equivalent of 1.25rem of space between them.</p>
                    <p>Use the elements and modules below to build out the pages.</p>
                </div>


                <div class="lg:w-full px-3 mb-16" id="typography">
                    <h2 class="mb-3">Typography</h2>
                    <p>The font-family we are using is Montserrat. The font styles are based off the Firespring Brand Guide.
                        We're utilizing <a href="https://fontawesome.bootstrapcheatsheets.com" target="_blank">Font Awesome</a> to add icons to the site.</p>

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
                    <h2 class="mb-3">Buttons</h2>

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
                            <td><code>.button.btn-add-sm</code></td>
                            <td><a href="" class="button btn-add-sm"><i class="fa fa-plus"></i></a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-add</code></td>
                            <td><a href="" class="button btn-add"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-favorite</td>
                            <td><button type="submit" class="button btn-favorite"><i class="fa fa-star "></i></button></td>
                        </tr>
                        <tr>
                            <td><code>.button.btn-large</code></td>
                            <td><a href="" class="button btn-large">Large Button</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="lg:w-full px-3 mb-16" id="badges">
                    <h2 class="mb-3">Badges</h2>
                    <p>Badges are used to quickly identify a site's status and if they are on the MMA or not.</p>
                    <p>To see badges being used, go to an individual client page.</p>

                    <h3 class="my-6">Example of a site with badges</h3>

                    <h3><a href="#">Site Name </a><span class="badge badge-live">Live</span> <span class="badge badge-dev">In Dev</span> <span class="badge badge-mma">MMA</span></h3>

                    <br>

                    <table class="lg:w-full">
                        <tbody>
                        <tr>
                            <td><code>.badge .badge-mma</code></td>
                            <td><span class="badge badge-mma">MMA</span></td>
                        </tr>
                        <tr>
                            <td><code>.badge .badge-live</code></td>
                            <td><span class="badge badge-live">Live</span></td>
                        </tr>
                        <tr>
                            <td><code>.badge .badge-dev</code></td>
                            <td><span class="badge badge-dev">In Dev</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="lg:w-full px-3 mb-16" id="modals">
                    <h2 class="mb-3">Modals</h2>
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

                <div class="lg:w-full px-3 mb-16" id="cards">
                    <h2 class="mb-3">Cards</h2>
                    <p>We use cards to group items together. Each card should get a Headline to note what the group is.</p>
                    <p>To see these cards in use, please see the Dashboard or a Client page.</p>

                    <h3 class="my-6">Example of a card list with an Add New button</h3>

                    <div class="lg:flex lg:flex-wrap items-center mb-2">
                        <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-laptop mr-1"></i> Example</h2>
                        <a href="" class="button btn-add-sm mb-1 -mt-1 ml-2"><i class="fa fa-plus"></i></a>
                    </div>
                    <div  class="lg:flex lg:flex-wrap card">
                        <div class="lg:w-full p-2">
                            <h3><a href="">Item One</a></h3>
                            <p class="text-gray-500 text-sm font-normal">This is the first item.</p>
                        </div>
                        <div class="lg:w-full p-2">
                            <h3><a href="">Item Two</a></h3>
                            <p class="text-gray-500 text-sm font-normal">This is the second item.</p>
                        </div>

                        <a href="" class="headline-lead text-xs no-underline text-right ml-auto">View Archives</a>
                    </div>

                    <h3 class="my-6">Example of Activity Feed</h3>

                    <h2 class="text-gray-500 mb-1 headline-lead"><i class="fa fa-commenting-o mr-1"></i> Activity Feed</h2>
                    <div class="card constrain-height">
                        <div class="border-b-2 py-6">
                            <span class="text-xs font-normal">This is an activity that happened.</span>
                            <span class="text-gray-500 text-xs font-normal">8/5/2019</span>
                        </div>
                        <div class="border-b-2 py-6">
                            <span class="text-xs font-normal">This is an activity that happened.</span>
                            <span class="text-gray-500 text-xs font-normal">8/3/2019</span>
                        </div>
                        <div class="border-b-2 py-6">
                            <span class="text-xs font-normal">This is an activity that happened.</span>
                            <span class="text-gray-500 text-xs font-normal">7/30/2019</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
