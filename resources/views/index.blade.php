<x-app-layout>
    <style>
        .top-header {
            background-image: url('/images/image.png');
            background-color: white;
            background-repeat: no-repeat;
            background-position: 120% 0;
        }

        @media screen and (max-width: 720px) {
            .top-header {
                background-position: 0% -2%;
            }
        }
    </style>
    <header class="md:h-screen top-header">
        <div class="header-content flex flex-col md:flex-row">
            <div class="md:pl-12 pt-40">
                <div class="content-header">
                    <h1 style="margin-top: -30px; font-family: Montserrat, helvetica neue, Arial, Helvetica, sans-serif;
    color: #290b7c;" class="text-blue-900 font-black text-5xl leading-tight pl-4 md:pl-0 md:w-5/6">
                        Meet Essay Flame - A site that <br> Writes
                        <span
                            class="js-rotating  morphext animate animate__backInUp h-20" id="js-rotating"><span>Papers, Essays, Research papers, Thesis, Term papers, Dissertations, Anything!</span></span>
                    </h1>
                    <p class="font-bold mt-8 pl-4 md:pl-0">Stuck on an essay? Get it done by an expert writer!</p>
                    <p class="font-bold pl-4 md:pl-0">Papers from pros you can trust!</p></div>
                <div class="header-buttons flex flex-col md:flex-row p-4 mt-10">
                    <div class="mx-auto md:mx-0 md:mr-4">
                        <form class="form" id="letExpert">
                            <select aria-label="Essay type" class="bg-white p-2 border px-8"
                                    id="essayType" name="essayType"
                                    style="border-radius: 20px; box-shadow: 1px 1px 40px -20px">
                                @foreach($types as $type)
                                    <option class="item" value="{{ $type->language }}">{{ $type->language }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="mt-6 md:mt-3 mx-auto md:mx-0">
                        <a href="{{ route('order-now') }}"
                           class="text-white font-bold rounded-2xl px-8 shadow hover:shadow-lg p-2 mt-2"
                           style="background: #6032e0">Let an Expert Do It <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row m-4 p-2 mt-10 md:mt-20">
                    <div class="md:border-r border-blue-700 ml-4 mr-4 pr-4 text-center h-20"><h5
                            class="font-bold text-xl">
                            Quick & Simple</h5>
                        <p>Reach a writer within minutes</p></div>
                    <div class="md:border-r border-blue-700 md-4 md:mb-0 ml-4 mr-4 pr-4 text-center h-20"><h5
                            class="font-bold text-xl">
                            Smart Pricing</h5>
                        <p>Negotiate the price directly with our experts</p></div>
                    <div class="ml-4 mr-4 md:border-blue-700 pr-4 text-center h-20"><h5 class="font-bold text-xl">
                            Skilled
                            Writers</h5>
                        <p>We have a team of professional academics</p></div>
                </div>
            </div>
        </div>
    </header>
    <main class="main-content p-4 mb-4" id="mainContent">
        <section class="how-it-works" style="margin-top: 20px; margin-bottom: 50px">
            <h2 class="text-center font-bold capitalize mb-4 text-2xl">How it works</h2>
            <p class="text-center after_title" style="    margin-top: -10px; margin-bottom: 50px; opacity: 0.8">Its
                as
                simple as these
                steps</p>
            <div class="flex flex-col md:flex-row">
                <div class="card shadow-xl rounded-lg bg-white md:w-1/4 p-4 m-4" data-aos="fade-up"
                     style="height: 225px;">
                    <div class="card-header text-center">
                        <i class="lnr lnr-cloud-check text-blue-400 text-5xl"></i></div>
                    <div class="card-body">
                        <h3 class="text-xl font-bold text-center">Create an account</h3>
                        <p class="text-center">Create an account easily using only your email and a password of your
                            choice. Your
                            information is encrypted and secured.</p></div>
                </div>
                <div class="card shadow-xl rounded-lg bg-white md:w-1/4 p-4 m-4" data-aos="fade-up"
                     data-aos-delay="100" style="height: 225px;">
                    <div class="card-header text-center"><i
                            class="lnr lnr-text-align-center text-blue-400 text-5xl"></i></div>
                    <div class="card-body">
                        <h3 class="text-xl font-bold text-center">Fill out form and place order</h3>
                        <p class="text-center">Fill out your paper details, the deadline, number of pages and make
                            payment.</p>
                    </div>
                </div>
                <div class="card shadow-xl rounded-lg bg-white md:w-1/4 p-4 m-4" data-aos="fade-up"
                     data-aos-delay="200" style="height: 225px;">
                    <div class="card-header text-center"><i class="lnr lnr-users text-blue-400 text-5xl"></i></div>
                    <div class="card-body">
                        <h3 class="text-xl font-bold text-center">Hire and collaborate with a writer</h3>
                        <p>Receive bids and hire the writer that seems fit to your paper requirements and
                            preferred
                            rating.</p></div>
                </div>
                <div class="card shadow-xl rounded-lg bg-white md:w-1/4 p-4 m-4 h-16" data-aos="fade-up"
                     data-aos-delay="300" style="height: 225px;">
                    <div class="card-header text-center"><i class="lnr lnr-line-spacing text-blue-400 text-5xl"></i>
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-bold text-center">Proofread Final Version</h3>
                        <p>Proofread your paper to make sure it meets your requirements and download the final
                            version.</p></div>
                </div>
            </div>
        </section>
        <section class="calc mb-8 bg-white md:w-11/12 pt-24 pb-24 md:ml-12 rounded shadow mt-8">
            <div class="float calculate-box">
                <div class="align">
                    <section class="calc-2cols flex flex-col md:flex-row justify-center">
                        <div class="calc-col-heading revealer mx-auto px-4 md:px-0">
                            <header style="margin-top: -40px"><h3 class="font-bold text-5xl">Get high-quality <br>
                                    papers from <span
                                        data-aos="fadeUp"
                                        data-aos-delay="100" class="text-blue-700">$10.00</span>
                                </h3>
                            </header>
                            <p style="opacity: 0.6;">at affordable prices within<br>the deadline specified</p>
                            <img src="/images/calcbg.jpg" class="w-3/4 ml-auto" style="margin-top: -50px"
                                 alt="calculator bg">
                        </div>
                        <div class="calc-col-form revealer md:w-1/3 mx-auto px-4 md:px-0">
                            @livewire('forms.home.calculator')
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <br>
        <section
            class="choose-writers row flex-row justify-content-center align-items-center justify-content-around"
            style="margin-top: 20px;">
            <div class="wrapper">
                <h2 class="text-center text-2xl capitalize font-bold">Multi-level essay writer selection
                    process</h2>
                <p style="opacity: 0.8" class="text-center w-1/2 mx-auto mt-4">We want only the top-grade writers to
                    work on your orders. That is why every
                    candidate undergoes a
                    thorough selection procedure to join our expert team.</p>
                <div class="flex flex-col md:flex-row mt-8 items-center">
                    <div class="content-col animate anim-stagger show md:w-1/4 m-4">
                        <svg class="mx-auto" fill="none" height="186" viewBox="0 0 186 186" width="186"
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="path"
                                  d="M185.705 92.8524c0 51.2806-41.572 92.8526-92.8526 92.8526C41.5714 185.705 0 144.133 0 92.8524 0 41.5714 41.5714 0 92.8524 0c51.2806 0 92.8526 41.5714 92.8526 92.8524zm-148.564 0c0 30.7686 24.9428 55.7116 55.7114 55.7116s55.7116-24.943 55.7116-55.7116c0-30.7686-24.943-55.7114-55.7116-55.7114-30.7686 0-55.7114 24.9428-55.7114 55.7114z"
                                  fill="#6E4CD7" stroke-dasharray="0" stroke-width="4"></path>
                            <path class="path"
                                  d="M48.2774 86.9589v-3.4662c1.608-.0715 2.7337-.1787 3.3769-.3216 1.0244-.2263 1.8582-.679 2.5014-1.3579.4407-.4646.7742-1.084 1.0006-1.8582.131-.4645.1965-.81.1965-1.0363h4.2345v25.9073h-5.2172V86.9589h-6.0927zm24.1743 5.1637c0 2.9778.2442 5.2589.7326 6.8431.4884 1.5723 1.4889 2.3583 3.0017 2.3583 1.5127 0 2.5014-.786 2.9659-2.3583.4765-1.5842.7147-3.8653.7147-6.8431 0-3.1208-.2382-5.4317-.7147-6.9325-.4645-1.5009-1.4532-2.2513-2.9659-2.2513-1.5128 0-2.5133.7504-3.0017 2.2513-.4884 1.5008-.7326 3.8117-.7326 6.9325zM76.186 78.74c3.2995 0 5.6103 1.1614 6.9325 3.4841 1.334 2.3228 2.0011 5.6223 2.0011 9.8985s-.6671 7.5697-2.0011 9.8804c-1.3222 2.311-3.633 3.466-6.9325 3.466s-5.6163-1.155-6.9504-3.466c-1.3221-2.3107-1.9832-5.6042-1.9832-9.8804s.6611-7.5757 1.9832-9.8985c1.3341-2.3227 3.6509-3.4841 6.9504-3.4841zm16.6344 13.3826c0 2.9778.2442 5.2589.7325 6.8431.4884 1.5723 1.489 2.3583 3.0017 2.3583 1.5128 0 2.5014-.786 2.966-2.3583.4764-1.5842.7144-3.8653.7144-6.8431 0-3.1208-.238-5.4317-.7144-6.9325-.4646-1.5009-1.4532-2.2513-2.966-2.2513-1.5127 0-2.5133.7504-3.0017 2.2513-.4883 1.5008-.7325 3.8117-.7325 6.9325zM96.5546 78.74c3.2995 0 5.6104 1.1614 6.9324 3.4841 1.334 2.3228 2.001 5.6223 2.001 9.8985s-.667 7.5697-2.001 9.8804c-1.322 2.311-3.6329 3.466-6.9324 3.466-3.2995 0-5.6162-1.155-6.9503-3.466-1.3222-2.3107-1.9833-5.6042-1.9833-9.8804s.6611-7.5757 1.9833-9.8985c1.3341-2.3227 3.6508-3.4841 6.9503-3.4841zm17.7784 9.7913c.786 0 1.453-.274 2.001-.8219.559-.5599.839-1.2329.839-2.019 0-.7862-.28-1.4532-.839-2.0012-.548-.5598-1.215-.8397-2.001-.8397-.787 0-1.46.2799-2.019.8397-.548.548-.822 1.215-.822 2.0012 0 .7861.274 1.4591.822 2.019.559.5479 1.232.8219 2.019.8219zm6.646-2.8409c0 1.8343-.649 3.4007-1.947 4.6991-1.287 1.2983-2.853 1.9475-4.699 1.9475-1.835 0-3.401-.6492-4.7-1.9475-1.298-1.2984-1.947-2.8648-1.947-4.6991 0-1.8344.649-3.4008 1.947-4.6991 1.299-1.2984 2.865-1.9475 4.7-1.9475 1.834 0 3.4.6491 4.699 1.9475 1.298 1.2983 1.947 2.8647 1.947 4.6991zm13.561 13.0073c0-.7861-.28-1.4532-.839-2.0011-.548-.5599-1.215-.8398-2.002-.8398-.786 0-1.459.2799-2.019.8398-.547.5479-.821 1.215-.821 2.0011 0 .7862.274 1.4593.821 2.0193.56.548 1.233.822 2.019.822.787 0 1.454-.274 2.002-.822.559-.56.839-1.2331.839-2.0193zm3.806 0c0 1.8343-.649 3.4003-1.947 4.6993-1.299 1.298-2.865 1.947-4.7 1.947-1.834 0-3.4-.649-4.699-1.947-1.298-1.299-1.947-2.865-1.947-4.6993 0-1.8463.649-3.4126 1.947-4.6991 1.299-1.2983 2.865-1.9475 4.699-1.9475 1.835 0 3.401.6492 4.7 1.9475 1.298 1.2984 1.947 2.8647 1.947 4.6991zm-9.487-19.779h2.715l-14.436 26.5863h-2.77l14.491-26.5863z"
                                  fill="#373F59" stroke-dasharray="0"></path>
                            <path
                                d="M93.2486 18.7705c-40.8779 0-74.0152 33.1373-74.0152 74.0152 0 40.8783 33.1373 74.0153 74.0152 74.0153 40.8774 0 74.0154-33.137 74.0154-74.0153-.004-40.8779-33.141-74.0152-74.0154-74.0152zm55.5244 74.0113c0 5.7132-.863 11.2242-2.467 16.4092-5.363 17.361-19.011 31.083-36.326 36.548-5.282 1.666-10.9017 2.567-16.7314 2.567-5.8686 0-11.5235-.913-16.8328-2.602-.0155-.004-.031-.012-.0505-.016l.0078-.066-.8001-.252-.0077.05c-16.7046-5.608-29.8593-18.938-35.223-35.751-1.6972-5.325-2.6177-10.9992-2.6177-16.8872 0-6.2763 1.0447-12.308 2.9634-17.9358l.0466.0039.2097-.7185c5.5928-15.6909 18.0407-28.1232 33.7393-33.6927 5.8064-2.0585 12.0556-3.1848 18.5689-3.1848 6.4977 0 12.7315 1.1186 18.5265 3.1693 16.199 5.7326 28.946 18.7708 34.279 35.153 1.759 5.4219 2.715 11.2011 2.715 17.2056z"
                                fill="#000" opacity=".05"></path>
                        </svg>
                        <div class="title mt-4 text-center">STEP 1</div>
                        <p>First, we expect our future writers to have a University masters degree and at least 2
                            years of
                            expertise in custom writing. All applicants for the writer’s position must meet these
                            requirements. Otherwise, we turn down the candidate right away.</p></div>
                    <div class="content-col animate anim-stagger show md:w-1/4 m-4">
                        <svg class="mx-auto" fill="none" height="186" viewBox="0 0 186 186" width="183"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M182.96 92.3098c0 50.5232-40.957 91.4802-91.4798 91.4802C40.9571 183.79 0 142.833 0 92.3098 0 41.7867 40.9571.8296 91.4802.8296c50.5228 0 91.4798 40.9571 91.4798 91.4802zm-146.3679 0c0 30.3142 24.5742 54.8882 54.8881 54.8882 30.3138 0 54.8878-24.574 54.8878-54.8882 0-30.3139-24.574-54.8881-54.8878-54.8881-30.3139 0-54.8881 24.5742-54.8881 54.8881z"
                                fill="#FAFAFA"></path>
                            <path
                                d="M182.96 92.3098a91.481 91.481 0 01-17.471 53.7702 91.4775 91.4775 0 01-45.74 33.233 91.4915 91.4915 0 01-56.5377 0 91.4778 91.4778 0 01-45.7401-33.233 91.4792 91.4792 0 010-107.5409A91.48 91.48 0 01119.749 5.307L108.442 40.108a54.8894 54.8894 0 00-33.9232 0 54.8878 54.8878 0 00-37.9267 52.2017 54.886 54.886 0 0010.4827 32.2622 54.8791 54.8791 0 0027.444 19.939 54.888 54.888 0 0033.9232 0 54.8868 54.8868 0 0027.444-19.939 54.8868 54.8868 0 0010.482-32.2622h36.592z"
                                fill="#6E4CD7"></path>
                            <path
                                d="M66.1345 95.8246c0 1.085.2789 1.9267.8367 2.525.5678.5983 1.3487.8975 2.3425.8975.9938 0 1.7696-.2992 2.3273-.8975.5679-.5983.8519-1.44.8519-2.525 0-1.1257-.2891-1.9775-.8671-2.5555-.5679-.5882-1.3386-.8823-2.3121-.8823s-1.7493.2941-2.3273.8823c-.5679.578-.8519 1.4298-.8519 2.5555zm-4.5025.289c0-1.2372.2789-2.3578.8366-3.3617.5679-1.004 1.3944-1.7595 2.4795-2.2665-1.0648-.7099-1.7595-1.4755-2.084-2.2969-.3144-.8316-.4715-1.6074-.4715-2.3274 0-1.6022.6033-2.9662 1.8101-4.0918 1.2068-1.1358 2.9104-1.7037 5.111-1.7037 2.2006 0 3.9042.5679 5.111 1.7037 1.2068 1.1256 1.8101 2.4896 1.8101 4.0918 0 .72-.1622 1.4958-.4867 2.3274-.3144.8214-1.004 1.5363-2.0688 2.1448 1.0851.6084 1.9015 1.4146 2.4491 2.4186.5476 1.0039.8214 2.1245.8214 3.3617 0 1.8557-.6896 3.4377-2.0688 4.7454-1.369 1.299-3.2856 1.948-5.7498 1.948-2.4643 0-4.3302-.649-5.5978-1.948-1.2676-1.3077-1.9014-2.8897-1.9014-4.7454zm4.898-9.7657c0 .8011.2434 1.4552.7302 1.9623.4969.507 1.1814.7605 2.0535.7605.8823 0 1.5617-.2535 2.0383-.7605.4868-.5071.7302-1.1612.7302-1.9623 0-.8721-.2434-1.5515-.7302-2.0383-.4766-.4969-1.156-.7454-2.0383-.7454-.8721 0-1.5566.2485-2.0535.7454-.4868.4868-.7302 1.1662-.7302 2.0383zm17.0215 5.0654c0 2.5352.2079 4.4772.6236 5.8259.4158 1.3386 1.2677 2.0079 2.5556 2.0079 1.2878 0 2.1295-.6693 2.525-2.0079.4057-1.3487.6085-3.2907.6085-5.8259 0-2.6569-.2028-4.6243-.6085-5.902-.3955-1.2778-1.2372-1.9166-2.525-1.9166-1.2879 0-2.1398.6388-2.5556 1.9166-.4157 1.2777-.6236 3.2451-.6236 5.902zM86.7307 80.02c2.809 0 4.7763.9887 5.9019 2.9662 1.1358 1.9775 1.7037 4.7865 1.7037 8.4271 0 3.6405-.5679 6.4445-1.7037 8.4118-1.1256 1.9669-3.0929 2.9509-5.9019 2.9509-2.8091 0-4.7815-.984-5.9173-2.9509-1.1256-1.9673-1.6884-4.7713-1.6884-8.4118 0-3.6406.5628-6.4496 1.6884-8.4271 1.1358-1.9775 3.1082-2.9662 5.9173-2.9662zm15.1353 8.3358c.669 0 1.237-.2332 1.704-.6997.476-.4766.715-1.0496.715-1.7189s-.239-1.2372-.715-1.7037c-.467-.4766-1.035-.7149-1.704-.7149s-1.242.2383-1.719.7149c-.4665.4665-.6997 1.0344-.6997 1.7037s.2332 1.2423.6997 1.7189c.477.4665 1.05.6997 1.719.6997zm5.659-2.4186c0 1.5617-.553 2.8952-1.659 4.0006-1.095 1.1053-2.428 1.658-4 1.658-1.562 0-2.8953-.5527-4.0007-1.658-1.1053-1.1054-1.658-2.4389-1.658-4.0006 0-1.5617.5527-2.8952 1.658-4.0006 1.1054-1.1053 2.4387-1.658 4.0007-1.658 1.562 0 2.895.5527 4 1.658 1.106 1.1054 1.659 2.4389 1.659 4.0006zM119.07 97.011c0-.6693-.238-1.2372-.715-1.7036-.467-.4767-1.034-.715-1.704-.715-.669 0-1.242.2383-1.719.715-.466.4664-.699 1.0343-.699 1.7036s.233 1.2423.699 1.7189c.477.4665 1.05.6997 1.719.6997.67 0 1.237-.2332 1.704-.6997.477-.4766.715-1.0496.715-1.7189zm3.24 0c0 1.5617-.553 2.8953-1.658 4.001-1.105 1.105-2.439 1.658-4.001 1.658-1.561 0-2.895-.553-4-1.658-1.106-1.1057-1.658-2.4393-1.658-4.001 0-1.5718.552-2.9053 1.658-4.0005 1.105-1.1054 2.439-1.6581 4-1.6581 1.562 0 2.896.5527 4.001 1.6581 1.105 1.1053 1.658 2.4388 1.658 4.0005zm-8.077-16.8389h2.312l-12.291 22.6349h-2.358l12.337-22.6349z"
                                fill="#373F59"></path>
                            <path
                                d="M91.5434 19.3232c-40.2737 0-72.9213 32.6476-72.9213 72.9214 0 40.2734 32.6476 72.9214 72.9213 72.9214 40.2736 0 72.9216-32.648 72.9216-72.9214-.004-40.2738-32.652-72.9214-72.9216-72.9214zm54.7036 72.9176c0 5.6287-.85 11.0582-2.43 16.1672-5.284 17.104-18.731 30.623-35.789 36.007-5.204 1.642-10.741 2.529-16.4846 2.529-5.7818 0-11.3531-.899-16.584-2.563-.0153-.004-.0306-.012-.0497-.016l.0077-.065-.7883-.249-.0077.05c-16.4577-5.525-29.418-18.658-34.7024-35.223-1.6721-5.246-2.579-10.8363-2.579-16.6372 0-6.1836 1.0293-12.1262 2.9196-17.6707l.0459.0038.2066-.7079c5.5102-15.459 17.7741-27.7076 33.2407-33.1948 5.7206-2.028 11.8774-3.1377 18.2945-3.1377 6.4017 0 12.5427 1.102 18.2527 3.1224 15.96 5.6479 28.518 18.4934 33.772 34.6335 1.734 5.3418 2.675 11.0356 2.675 16.9514z"
                                fill="#000" opacity=".05"></path>
                        </svg>
                        <div class="title mt-4 text-center">STEP 2</div>
                        <p>The next stage is an English language test and subject proficiency assessment. Excellent
                            knowledge in the study area is another essential requirement to join our team. 80% of
                            candidates
                            pass the exam successfully.</p></div>
                    <div class="content-col animate anim-stagger show md:w-1/4 m-4">
                        <svg class="mx-auto mt-12" fill="none" height="186" viewBox="0 0 186 186" width="183"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M182.046 91.8524c0 50.2706-40.753 91.0226-91.0232 91.0226C40.7523 182.875 0 142.123 0 91.8524 0 41.5819 40.7523.8296 91.0228.8296c50.2702 0 91.0232 40.7523 91.0232 91.0228zm-145.6369 0c0 30.1626 24.4514 54.6136 54.6137 54.6136 30.1622 0 54.6132-24.451 54.6132-54.6136 0-30.1623-24.451-54.6137-54.6132-54.6137-30.1623 0-54.6137 24.4514-54.6137 54.6137z"
                                fill="#FAFAFA"></path>
                            <path
                                d="M155.386 156.215a91.0264 91.0264 0 01-50.124 25.54 91.021 91.021 0 01-55.5627-8.801 91.0186 91.0186 0 01-39.7784-39.778 91.0232 91.0232 0 01-8.8003-55.5627l35.9609 5.6956a54.612 54.612 0 005.2801 33.3371 54.612 54.612 0 0023.8671 23.868 54.6221 54.6221 0 0033.3375 5.28A54.6173 54.6173 0 00129.64 130.47l25.746 25.745z"
                                fill="#6E4CD7"></path>
                            <path
                                d="M77.9884 97.145h-2.4821v4.722h-4.2228v-4.722h-8.6876v-3.7687l8.0671-13.319h4.8433v13.7125h2.4821v3.3752zm-6.7049-3.3752v-9.4746l-5.4941 9.4746h5.4941zm13.1223-2.6638c0 2.5226.2068 4.4548.6205 5.7968.4137 1.3319 1.2613 1.9979 2.5428 1.9979 1.2814 0 2.1189-.666 2.5124-1.9979.4036-1.342.6054-3.2742.6054-5.7968 0-2.6436-.2018-4.6011-.6054-5.8725-.3935-1.2713-1.231-1.907-2.5124-1.907-1.2815 0-2.1291.6357-2.5428 1.907-.4137 1.2714-.6205 3.2289-.6205 5.8725zm3.1633-11.3363c2.7949 0 4.7524.9838 5.8724 2.9514 1.1301 1.9676 1.6952 4.7625 1.6952 8.3849s-.5651 6.4123-1.6952 8.3698c-1.12 1.9572-3.0775 2.9362-5.8724 2.9362-2.795 0-4.7576-.979-5.8877-2.9362-1.12-1.9575-1.68-4.7474-1.68-8.3698s.56-6.4173 1.68-8.3849c1.1301-1.9676 3.0927-2.9514 5.8877-2.9514zm15.0599 8.2941c.666 0 1.231-.232 1.695-.6962.474-.4742.711-1.0443.711-1.7103 0-.6659-.237-1.231-.711-1.6951-.464-.4743-1.029-.7114-1.695-.7114-.666 0-1.236.2371-1.711.7114-.464.4641-.696 1.0292-.696 1.6951 0 .666.232 1.2361.696 1.7103.475.4642 1.045.6962 1.711.6962zm5.63-2.4065c0 1.5539-.55 2.8808-1.65 3.9806-1.09 1.0998-2.416 1.6497-3.98 1.6497-1.554 0-2.8811-.5499-3.9809-1.6497-1.0999-1.0998-1.6498-2.4267-1.6498-3.9806s.5499-2.8807 1.6498-3.9805c1.0998-1.0999 2.4269-1.6498 3.9809-1.6498 1.554 0 2.88.5499 3.98 1.6498 1.1 1.0998 1.65 2.4266 1.65 3.9805zm11.488 11.0185c0-.666-.238-1.231-.712-1.6952-.464-.4742-1.029-.7113-1.695-.7113-.666 0-1.236.2371-1.71.7113-.464.4642-.696 1.0292-.696 1.6952 0 .6659.232 1.236.696 1.7103.474.4641 1.044.6962 1.71.6962.666 0 1.231-.2321 1.695-.6962.474-.4743.712-1.0444.712-1.7103zm3.223 0c0 1.5539-.549 2.8807-1.649 3.9802-1.1 1.1-2.427 1.65-3.981 1.65-1.554 0-2.881-.55-3.98-1.65-1.1-1.0995-1.65-2.4263-1.65-3.9802 0-1.564.55-2.8908 1.65-3.9806 1.099-1.0998 2.426-1.6497 3.98-1.6497 1.554 0 2.881.5499 3.981 1.6497 1.1 1.0999 1.649 2.4267 1.649 3.9806zm-8.036-16.7547h2.3l-12.229 22.5209h-2.346l12.275-22.5209z"
                                fill="#373F59"></path>
                            <path
                                d="M90.7677 19.2305c-40.0724 0-72.5568 32.4843-72.5568 72.5567 0 40.0728 32.4844 72.5568 72.5568 72.5568 40.0723 0 72.5563-32.484 72.5563-72.5568-.003-40.0724-32.488-72.5567-72.5563-72.5567zm54.4303 72.5529c0 5.6006-.846 11.0036-2.418 16.0856-5.258 17.019-18.637 30.471-35.61 35.828-5.178 1.633-10.6875 2.516-16.4023 2.516-5.7529 0-11.2964-.894-16.5011-2.551-.0152-.003-.0304-.011-.0495-.015l.0076-.065-.7843-.247-.0076.049c-16.3754-5.497-29.2709-18.564-34.5289-35.046-1.6638-5.22-2.5661-10.7826-2.5661-16.5546 0-6.1527 1.0241-12.0655 2.905-17.5824l.0457.0039.2056-.7044c5.4825-15.3817 17.6851-27.5691 33.0744-33.0288 5.692-2.0179 11.8181-3.122 18.203-3.122 6.3697 0 12.4805 1.0965 18.1615 3.1068 15.88 5.6196 28.376 18.4009 33.603 34.4603 1.725 5.3151 2.662 10.9804 2.662 16.8666z"
                                fill="#000" opacity=".05"></path>
                        </svg>
                        <div class="title mt-4 text-center">STEP 3</div>
                        <p>The third stage is a personal interview. A good essay writer is a qualified professional
                            with the
                            necessary hard and soft skills. A one-on-one meeting allows us to find flexible and
                            outgoing
                            writers with great time-management qualities and a genuine passion for writing. 40% of
                            applicants get to the next round.</p></div>
                    <div class="content-col animate anim-stagger show md:w-1/4 m-4">
                        <svg class="mx-auto mt-8" fill="none" height="186" viewBox="0 0 186 186" width="183"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M182.961 92.3099c0 50.5231-40.958 91.4801-91.4807 91.4801C40.9571 183.79 0 142.833 0 92.3099 0 41.7867 40.9571.8296 91.4803.8296c50.5227 0 91.4807 40.9571 91.4807 91.4803zm-146.3689 0c0 30.3141 24.5743 54.8881 54.8882 54.8881 30.3137 0 54.8877-24.574 54.8877-54.8881 0-30.3139-24.574-54.8882-54.8877-54.8882-30.3139 0-54.8882 24.5743-54.8882 54.8882z"
                                fill="#FAFAFA"></path>
                            <path
                                d="M45.7405 171.534a91.4782 91.4782 0 01-32.5089-31.835l31.2996-18.956a54.8759 54.8759 0 0019.5053 19.101l-18.296 31.69z"
                                fill="#6E4CD7"></path>
                            <path
                                d="M77.3607 95.8245c0 1.0851.2788 1.9268.8366 2.5251.5679.5983 1.3487.8975 2.3425.8975.9938 0 1.7696-.2992 2.3274-.8975.5679-.5983.8518-1.44.8518-2.5251 0-1.1256-.289-1.9774-.867-2.5555-.5679-.5881-1.3386-.8822-2.3122-.8822-.9735 0-1.7493.2941-2.3273.8822-.5679.5781-.8518 1.4299-.8518 2.5555zm-4.5026.2891c0-1.2372.2789-2.3578.8366-3.3617.5679-1.004 1.3944-1.7595 2.4795-2.2665-1.0648-.7099-1.7595-1.4755-2.084-2.2969-.3143-.8316-.4715-1.6074-.4715-2.3274 0-1.6022.6034-2.9662 1.8101-4.0918 1.2068-1.1358 2.9105-1.7037 5.111-1.7037 2.2006 0 3.9043.5679 5.111 1.7037 1.2068 1.1256 1.8102 2.4896 1.8102 4.0918 0 .72-.1623 1.4958-.4868 2.3274-.3143.8214-1.0039 1.5363-2.0687 2.1448 1.0851.6084 1.9014 1.4146 2.449 2.4186.5476 1.0039.8214 2.1245.8214 3.3617 0 1.8557-.6896 3.4377-2.0687 4.7454-1.369 1.299-3.2857 1.948-5.7499 1.948-2.4642 0-4.3302-.649-5.5978-1.948-1.2676-1.3077-1.9014-2.8897-1.9014-4.7454zm4.8981-9.7657c0 .8011.2433 1.4552.7301 1.9622.4969.5071 1.1814.7606 2.0535.7606.8823 0 1.5617-.2535 2.0384-.7606.4867-.507.7301-1.1611.7301-1.9622 0-.8721-.2434-1.5516-.7301-2.0383-.4767-.4969-1.1561-.7454-2.0384-.7454-.8721 0-1.5566.2485-2.0535.7454-.4868.4867-.7301 1.1662-.7301 2.0383zm17.995 2.0079c.6693 0 1.2372-.2333 1.7036-.6997.4767-.4767.715-1.0496.715-1.7189s-.2383-1.2372-.715-1.7037c-.4664-.4766-1.0343-.7149-1.7036-.7149s-1.2423.2383-1.7189.7149c-.4665.4665-.6997 1.0344-.6997 1.7037s.2332 1.2422.6997 1.7189c.4766.4664 1.0496.6997 1.7189.6997zm5.6588-2.4186c0 1.5617-.553 2.8952-1.6582 4.0006-1.0953 1.1053-2.4288 1.658-4.0006 1.658-1.5617 0-2.8953-.5527-4.0006-1.658-1.1054-1.1054-1.658-2.4389-1.658-4.0006 0-1.5617.5526-2.8952 1.658-4.0006 1.1053-1.1054 2.4389-1.658 4.0006-1.658 1.5617 0 2.8952.5526 4.0006 1.658 1.1052 1.1054 1.6582 2.4389 1.6582 4.0006zm11.545 11.0738c0-.6693-.238-1.2372-.715-1.7036-.466-.4767-1.034-.715-1.703-.715-.67 0-1.243.2383-1.719.715-.467.4664-.7 1.0343-.7 1.7036s.233 1.2423.7 1.7189c.476.4665 1.049.6997 1.719.6997.669 0 1.237-.2332 1.703-.6997.477-.4766.715-1.0496.715-1.7189zm3.24 0c0 1.5617-.552 2.8953-1.658 4.001-1.105 1.105-2.439 1.658-4 1.658-1.562 0-2.896-.553-4.001-1.658-1.105-1.1057-1.658-2.4393-1.658-4.001 0-1.5718.553-2.9053 1.658-4.0006 1.105-1.1053 2.439-1.658 4.001-1.658 1.561 0 2.895.5527 4 1.658 1.106 1.1054 1.658 2.4389 1.658 4.0006zm-8.077-16.8389h2.312L98.1393 102.807h-2.3577l12.3364-22.6349z"
                                fill="#373F59"></path>
                            <path
                                d="M91.6803 19.3228c-40.2739 0-72.9215 32.6476-72.9215 72.9214 0 40.2738 32.6476 72.9218 72.9215 72.9218 40.2737 0 72.9217-32.648 72.9217-72.9218-.004-40.2738-32.652-72.9214-72.9217-72.9214zm54.7037 72.9176c0 5.6288-.85 11.0586-2.43 16.1666-5.284 17.105-18.731 30.624-35.789 36.008-5.204 1.641-10.7412 2.529-16.4847 2.529-5.7819 0-11.3532-.899-16.5841-2.564-.0153-.004-.0306-.011-.0497-.015l.0076-.065-.7882-.249-.0077.05c-16.4577-5.526-29.418-18.658-34.7024-35.223-1.6722-5.246-2.5791-10.8366-2.5791-16.6376 0-6.1836 1.0293-12.1262 2.9196-17.6708l.046.0039.2066-.7079c5.5101-15.4591 17.774-27.7077 33.2407-33.1948 5.7206-2.0281 11.8775-3.1378 18.2945-3.1378 6.4017 0 12.5429 1.1021 18.2519 3.1224 15.961 5.6479 28.519 18.4935 33.773 34.6336 1.733 5.3418 2.675 11.0356 2.675 16.9514z"
                                fill="#000" opacity=".05"></path>
                        </svg>
                        <div class="title mt-4 text-center">STEP 4</div>
                        <p>As a final proof-test, the remaining candidates have to complete a guest assignment to
                            show their
                            competence and ability to cope with real orders. Only 8% perform the best and complete a
                            top-quality custom paper free of mistakes and plagiarisms. </p></div>
                </div>
            </div>
        </section>
        <section class="testimonials mt-8">
            <div class="container">
                <div class="title">
                    <h2 class="text-center text-2xl font-bold capitalize">Testimonials</h2></div>
                <div class="after_title text-center mb-8" style="opacity: 0.8;">Students’ comments and reviews</div>
                <div class="mt-4 flex flex-col md:flex-row justify-center">
                    <div class="box_testimonial bg-white rounded-lg shadow-lg p-2 mr-4 ml-4 mb-4 md:mb-0 md:w-1/3"
                         data-aos="fade-right">
                        <div class="info_bl"><img alt="" class="loaded" data-was-processed="true"
                                                  src="images/foto_1.webp">
                            <div class="author">
                                <div class="name font-bold text-blue-400">Patrick</div>
                                <div class="date">May 18 <span class="font-gray-600 text-2xl">.</span></div>
                            </div>
                        </div>
                        <div class="content">Super easy setting it all up. The work was amazing and delivery was
                            very quick.
                            Will definitely use services again.
                        </div>
                    </div>
                    <div class="box_testimonial bg-white rounded-lg shadow-lg p-2 mr-4 ml-4 md:ml-0 md:w-1/3"
                         data-aos="fade-left">
                        <div class="info_bl"><img alt="" class="loaded" data-was-processed="true"
                                                  src="images/foto_3.webp">
                            <div class="author">
                                <div class="name font-bold text-blue-400">Gvido Mooneli</div>
                                <div class="date">September 25 <span class="font-gray-600 text-2xl">.</span></div>
                            </div>
                        </div>
                        <div class="content">It was great working with the Essay Flame the experts responded quickly
                            and
                            delivered quickly. I would definitely work with Essay Flame again and recommend them.
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row mt-4 justify-center">
                    <div class="box_testimonial bg-white rounded-lg shadow-lg p-2 mr-4 ml-4 mb-4 md:mb-0 md:w-1/3"
                         data-aos="fade-right" data-aos-delay="300">
                        <div class="info_bl"><img alt="" class="loaded" data-was-processed="true"
                                                  src="images/foto_2.webp">
                            <div class="author">
                                <div class="name text-blue-400 font-bold">Samantha Mason</div>
                                <div class="date">October 13 <span>.</span></div>
                            </div>
                        </div>
                        <div class="content">I like that you guys keep my personal info private. This year I had a
                            tough
                            time trying to manage my hobbies (I LOVE DANCING!), extra projects and courses (I take
                            loads
                            online) and my studying in college. Also, I had to take some freelance translations to
                            pay my
                            bills. So, I guess, it all was too much. Thank you for your help... You saved my life!
                        </div>
                    </div>
                    <div class="box_testimonial bg-white rounded-lg shadow-lg p-2 mr-4 ml-4 md:ml-0 md:w-1/3"
                         data-aos="fade-left"
                         data-aos-delay="300">
                        <div class="info_bl"><img alt="" class="loaded" data-was-processed="true"
                                                  src="images/foto_4.webp">
                            <div class="author">
                                <div class="name text-blue-400 font-bold">Walleed</div>
                                <div class="date">October 28 <span>.</span></div>
                            </div>
                        </div>
                        <div class="content">The Writers supported me in different times they have all the skills
                            enough to
                            explaining to me. The writers have some attitude and experience in my field. I encourage
                            everyone to work with this website because they have skillful experts and have a good
                            punctuality. Thank you
                        </div>
                    </div>
                </div>
                <div class="text_more text-center mt-8">Want to <strong>leave feedback</strong> or <strong>read more
                        testimonials </strong> about
                    Essay Flame<br>Visit our <a class="review text-blue-400" href="">Review
                        Page</a></div>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('js/morphext/dist/morphext.css') }}}">
        <script src="{{ asset('js/morphext/dist/morphext.min.js') }}"></script>
        <script>
            $("#js-rotating").Morphext({
                // The [in] animation type. Refer to Animate.css for a list of available animations.
                animation: "fadeInUp",
                // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
                separator: ",",
                // The delay between the changing of each phrase in milliseconds.
                speed: 2000,
                complete: function () {
                    // Called after the entrance animation is executed.
                }
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#calc_form').submit(function (e) {
                    e.preventDefault();
                    $('#submit').html("Submitting...")
                    $('.text-danger').html("");
                    let paper = $('#topic').val();
                    let academicLevel = $('#academic_level').val();
                    let deadline = $('#deadline').val();
                    let pages = $('#form_pages').val();
                    let price = $('#calprice_div').text();

                    $.ajax({
                        type: "POST",
                        url: 'order.php',
                        data: {
                            'paper': paper, 'academicLevel': academicLevel, 'deadline': deadline,
                            'pages': pages, 'price': price
                        },
                        success: function (data) {
                            if (data === '') {
                                window.location = '/user/draft/new.php';
                            } else if (data.location) {
                                window.location = data.location
                            } else {
                                $('.text-danger').html(data);
                                $('#submit').html("Next Step");
                            }
                        }
                    });
                });
                $('.expert-button').click(function (e) {
                    e.preventDefault();
                    $('.expert-button').html("Submitting...")
                    let essayType = $('#essayType').val();

                    $.ajax({
                        type: "GET",
                        url: 'order.php',
                        data: {'paper': essayType},
                        success: function (data) {
                            if (data === '') {
                                window.location = '/user/draft/new.php';
                            } else if (data.location) {
                                window.location = data.location
                            } else {
                                $('.text-danger').html(data);
                                $('.expert-button').html("Let an Expert Do It");
                            }
                        }
                    });
                });
            });
        </script>
    </main>

    @include('includes.footer')

</x-app-layout>
