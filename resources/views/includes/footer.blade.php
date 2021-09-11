<div class="w-screen" style="background:#212529;">
    <footer class="p-8">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/4 p-4 mr-4">
                <span class="text-white font-bold text-xl pb-2">Disclaimer</span>
                <p class="text-gray-400 text-sm">
                    Research into the subject, generating initial input for further reasoning and citations;
                    Comparison of key points of view on the subject, general reasoning; Paraphrasing in accordance
                    with major educational
                    standards as well as tailored to your college/university guidelines for plagiarism/paraphrase -
                    if different;
                    Citations - based on our recommendations and service's Terms and Conditions.
                </p>
            </div>

            <div class="md:w-1/4 p-4 mr-2">
                <span class="text-white font-bold text-xl capitalize pb-2">About us</span>
                <ul class="footer__section-content footer__text leading-loose md:leading-7 list-none">
                    <li class="footer__section-item d-none-mobile">
                        <a href="/" class="text-gray-400 text-sm hover:underline">Home</a>
                    </li>
                    <li class="footer__section-item d-none-mobile">
                        <a href="{{ route('top-writers') }}" class="text-gray-400 text-sm hover:underline">Top
                            Writers</a>
                    </li>
                    <li class="footer__section-item d-none-mobile">
                        <a href="{{ route('contact') }}" class="text-gray-400 text-sm hover:underline">Contact
                            Support</a>
                    </li>
                    <li class="footer__section-item d-none-mobile">
                        <a href="{{ route('faqs') }}" class="text-gray-400 text-sm hover:underline">FAQ</a>
                    </li>
                    {{--                    <li class="footer__section-item">--}}
                    {{--                        <a href="{{ route('blog') }}">Blog</a>--}}
                    {{--                    </li>--}}
                    <li class="footer__section-item">
                        <a href="{{ route('writer-registration') }}" class="text-gray-400 text-sm hover:underline">Write
                            for Essay Flame</a>
                    </li>
                    <li class="footer__section-item">
                        <a href="/money-back-guarantee.php" class="text-gray-400 text-sm hover:underline">Money Back
                            Guarantee</a>
                    </li>
                    <li class="footer__section-item">
                        <a href="{{ route('about') }}" class="text-gray-400 text-sm hover:underline">About us</a>
                    </li>
                </ul>
            </div>

            <div class="md:w-1/4 p-4 mr-2">
                <div class="footer__section footer__section_fb_85">
                    <span class="text-xl text-white font-bold">Latest Posts</span>
                    <?php
                    $posts = \App\Models\Post::orderBy('created_at', 'desc')->limit(4)->get();
                    ?>
                    <ul class="footer__section-content footer__text list-none">
                        @foreach($posts as $post)
                            <li class="footer__section-item">
                                <a href="{{ route('blog.read', ['slug' => $post->slug]) }}"
                                   class="text-gray-400 text-sm hover:underline">{{ $post->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-4">
                    <span class="text-xl font-bold text-white">Pages</span>
                    <ul class="footer__section-content footer__text list-none">
                        <li class="footer__section-item">
                            <a href="{{ route('top-writers') }}" class="text-gray-400 text-sm hover:underline">Top
                                Writers</a>
                        </li>
                        <li class="footer__section-item">
                            <a href="{{ route('blog') }}" class="text-gray-400 text-sm hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="md:w-1/4 p-4 mr-2">
                <div class="footer__col footer__col_mb_20 footer__col_contact">
                    <div class="footer__section footer__section_fb_85">
                        <span class="text-white text-xl font-bold">Contact us:</span>
                        <ul class="footer__section-content footer__text list-none">
                            <li class="footer__section-item footer__section-item_contact footer__section-item_message">
                                <a href="mailto:support@essayflame.com" class="text-gray-400 hover:underline">support@essayflame.com</a>
                            </li>
                            <li class="footer__section-item footer__section-item_contact footer__section-item_phone">
                                <i class="fa fa-whatsapp" style="font-size: 1.5em"></i><a href="tel:+13652400947"
                                                                                          class="hover:underline text-gray-400">
                                    +1
                                    (365) 240 0947</a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <span class="text-white font-bold text-xl mt-8 pt-4">Follow us:</span>
                        <ul class="flex flex-row space-x-2 list-none">
                            <li class="footer__social-item">
                                <a href="https://www.facebook.com/essayflame" target="_blank">
                                    <ion-icon name="logo-facebook" style="font-size: 20px; color: gray"></ion-icon>
                                </a>
                            </li>
                            <li class="footer__social-item">
                                <a href="https://twitter.com/essayflame" target="_blank">
                                    <ion-icon name="logo-twitter" style="font-size: 20px; color: gray"></ion-icon>
                                </a>
                            </li>
                            <li class="footer__social-item">
                                <a href="https://www.linkedin.com/in/essayflame" target="_blank">
                                    <ion-icon name="logo-linkedin" style="font-size: 20px; color: gray"></ion-icon>
                                </a>
                            </li>
                            <li class="footer__social-item">
                                <a href="https://www.instagram.com/essayflame" target="_blank">
                                    <ion-icon name="logo-instagram" style="font-size: 20px; color: gray"></ion-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col md:flex-row justify-between mt-4 mb-5">
            <div class="footer__col footer__col_dmca">
                <div class="flex flex-row space-x-3">
                    <a class="dmca-badge"
                       href=""
                       title="Comodo Protection Status">
                        <img alt="DMCA.com Protection Status" class="mt-1"
                             data-src="{{ asset('/images/comodo.png') }}"
                             src="{{ asset('/images/comodo.png') }}">
                    </a>
                    <a class="dmca-badge"
                       href=""
                       title="Money back guarantee">
                        <img alt="DMCA.com Protection Status" class=""
                             data-src="{{ asset('/images/money-back-guarantee.png') }}"
                             src="{{ asset('/images/money-back-guarantee.png') }}">
                    </a>
                    <a class="dmca-badge"
                       href=""
                       title="Money back guarantee">
                        <img alt="DMCA.com Protection Status" class=""
                             data-src="{{ asset('/images/plagairismfree.png') }}"
                             src="{{asset('/images/plagairismfree.png')}}">
                    </a>
                </div>
            </div>

            <div>
                <div class="footer__section">
                    <span class="font-bold text-sm text-white">We accept:</span>
                    <ul class="flex flex-row space-x-4 list-none">
                        <li class="footer__card-item">
                            <img alt="visa payment" src="{{ asset('/images/visa.png') }}">
                        </li>
                        <!--							<li class="footer__card-item">-->
                        <!--								<img alt="american express" src="/images/payment/amex.png">-->
                        <!--							</li>-->
                        <li class="footer__card-item">
                            <img alt="mastercard" src="{{ asset('/images/mc.png') }}">
                        </li>
                        <!--							<li class="footer__card-item">-->
                        <!--								<img alt="discover" src="/images/payment/dc.png">-->
                        <!--							</li>-->
                        <li class="footer__card-item">
                            <img alt="discover" src="{{ asset('/images/images.png') }}" class="w-12">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-4" style="border-top: 1px solid #3a3f4a;">
            <div class="mt-4">
                <div class="footer__bottom-wrap" style="margin: auto; text-align: center;">
                    <p class="text-gray-400 text-sm" style="margin: auto;
    text-align: center;">
                        ©
                        <script>
                            let currentYear = String(new Date().getFullYear());
                            document.write(currentYear)
                        </script>
                        essayflame.com. All rights reserved</span>
                        <br>
                        <span>
                        <a href="/privacy.php" rel="nofollow" style="color: #a1a9b3;"
                           class="underline border-r pr-8 text-xs">Privacy Policy</a>
                        <a href="/terms.php" rel="nofollow" style="color: #a1a9b3;" class="pl-8 underline text-xs">Terms of Use</a>
                    </span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
