                @php
                $enc = new App\Classes\Enc;
                @endphp
                @foreach ($site as $sit )
                @endforeach
                <nav class="bg-{{$sit->cor}}-500 border-gray-200 px-2 sm:px-4 py-2.5 ">
                    <div class="container flex flex-wrap justify-between items-center mx-auto">
                      <a href="https://www.{{$sit->slug}}.crmcorretor.com.br" class="flex items-center">
                        @if ($sit->logo != ' ')
                        <img src="{{ asset("storage/site/$sit->logo") }}" height="90" width="125" class="mr-3 h-6 sm:h-9" alt="Logo" />
                        @else
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{$sit->name}}</span>
                        @endif
                      </a>
                      <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      </button>
                      <div class="hidden w-full md:block md:w-auto" id="mobile-menu">

                        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                            <li>
                                @foreach ($corretor as $corre )
                                <a href="{{ route('quero',['id' =>$enc->encriptar($corre->id ) ] ,'quero') }}">
                                <button type="submit" class="w-full  text-{{$sit->cor}}-500 bg-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                   QUERO AJUDA
                                    </button>
                                </a>
                              </li>
                            <li>
                            <button type="button" class="w-full  text-{{$sit->cor}}-500 bg-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">

                                {{$corre->celular}}
                                @endforeach
                                </button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <!--------wthas----------->

<!-- Facebook Pixel Code -->
<script>
     {{$pix= $sit->pix}}
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo $pix?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=<?php $pix?>&ev=PageView&noscript=1"
/></noscript>
