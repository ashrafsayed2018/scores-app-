@extends('layouts.app')

@section('content')

{{-- hero section --}}
<div class="hero lg:-mt-20 bg-hero-lg bg-cover bg-no-repeat bg-center" style="height: 400px">

    <div class="container mx-auto w-100 relative">

        <div class="hero-content absolute top-60 lg:w-2/5">
            <p class="text-white"> بيع ، إشتري او إستأجر علي المنصة الأولى</p>
            <h2 class="text-white font-bold text-3xl"> للتجارة الإلكترونية في الكويت </h2>
            <form action="" class="mt-5 relative">
                <i class="fa fa-search absolute right-2 top-4 transform rotate-90 text-gray-300"></i>
                <i class="fas fa-arrow-left absolute left-2 top-4 text-blue-300"></i>
                <input type="text" name="search" id="search" class="w-full px-2 py-3 focus:outline-none border-lg pr-7" placeholder="موبيلات">
            </form>
        </div>

   </div>

</div>
{{-- our categories section  --}}
<div class="categories mt-8">
    <div class="container mx-auto">
        <h2 class="text-gray-600 font-bold text-lg">اكتشف <span class="text-blue-500">اقسامنا</span></h2>
        <div class="p-10 grid md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach ($categories as $category)

            <div class="rounded overflow-hidden shadow-lg pr-2">
                <img class="w-full lazy h-40" src="{{ asset("storage/category_images/$category->image") }}" alt="Mountain">
                <div class="py-4">
                   {{ $category->name }}
                </div>
                <div class="pb-4 text-gray-600">
                   1166 اعلان
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
{{-- add ad --}}
<div class="add-ad mt-8">
    <div class="container mx-auto">
        <h2 class="font-bold">اضف اعلانك <span class="text-blue-500 font-bold">المثالي</span></h2>
        <div class="p-10 grid lg:grid-cols-3 gap-4">
            <div class="bg-blue-100 py-7 px-3 flex rounded-lg justify-center items-center gap-x-2">
                <div class="bg-white p-3  rounded-md">
                    <i class="fas fa-camera text-4xl text-blue-400"></i>
                </div>
                <p>الصور/الفيديو الواضحة تزيد الدعم لإعلانك</p>
            </div>
            <div class="bg-red-100 py-7 px-3 flex rounded-lg justify-center items-center gap-x-2">
                <div class="bg-white p-3 rounded-md">
                    <i class="far fa-sticky-note text-4xl text-blue-400"></i>
                </div>
                <p>تفاصيل أكثر تعني مشاهدات أكثر وظهور أسهل للإعلان</p>
            </div>
            <div class="bg-green-100 py-7 px-3 rounded-lg flex justify-center items-center gap-x-2">
                <div class="bg-white p-3 rounded-md">
                    <i class="fas fa-rocket text-4xl text-blue-400"></i>
                </div>
                <p>إختيار أي من امتيازاتنا سوف تعطي إعلانك دعم أكثر لمشاهدته من قبل الملايين</p>
            </div>
        </div>
    </div>
</div>
{{-- footer --}}
<div class="footer">
    <div class="container mx-auto">
         <div class="lg:flex flex-row-reverse">
             <div class="left flex-1 grid grid-cols-3 gap-4">
                  <div class="">
                      <h3>التصنيفات</h3>
                      <ul class="text-gray-500">
                          <li>محركات</li>
                          <li>عقارات</li>
                          <li>خدمات</li>
                          <li>بيع وشراء</li>
                          <li>حيوانات</li>
                          <li>وظائف</li>
                      </ul>
                  </div>
                  <div class="">
                    <h3>حسابي</h3>
                    <ul class="text-gray-500">
                        <li>معلومات حسابي</li>
                        <li>قائمتي</li>
                        <li>مفضلتي</li>
                        <li> المتابعون </li>
                    </ul>
                </div>
                <div class="">
                    <h3>معلومات</h3>
                    <ul class="text-gray-500">
                        <li>عنا</li>
                        <li>الشروط والاحكام</li>
                        <li>سياسة ملف التعريف</li>
                        <li>المدونه</li>
                        <li>اتصل بنا</li>
                        <li>خريطة الموقع</li>
                    </ul>
                </div>
             </div>
             <div class="right flex-1">
                <h3 class="mb-4">4sale للبيع </h3>
                <p class="text-gray-500 mb-3">حمل تطبيق 4Sale على iOS وAndroid البيع ، الشراء والتأجير أسهل أينما كنت</p>
                <p class="font-bold mb-3">حمل التطبيق</p>
                <div class="flex gap-3">
                    <div>
                        <svg width="100" height="30" viewBox="0 0 100 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><title>B9648C38-ED7F-4FF1-864D-E1D06369F7C1</title><defs><linearGradient x1="60.6706123%" y1="4.94958549%" x2="27.2298364%" y2="71.9258683%" id="linearGradient-1"><stop stop-color="#00A0FF" offset="0%"></stop><stop stop-color="#00A1FF" offset="0.6569999%"></stop><stop stop-color="#00BEFF" offset="26.01%"></stop><stop stop-color="#00D2FF" offset="51.22%"></stop><stop stop-color="#00DFFF" offset="76.04%"></stop><stop stop-color="#00E3FF" offset="100%"></stop></linearGradient><linearGradient x1="107.630451%" y1="50.0004315%" x2="-130.551706%" y2="50.0004315%" id="linearGradient-2"><stop stop-color="#FFE000" offset="0%"></stop><stop stop-color="#FFBD00" offset="40.87%"></stop><stop stop-color="#FFA500" offset="77.54%"></stop><stop stop-color="#FF9C00" offset="100%"></stop></linearGradient><linearGradient x1="86.243474%" y1="30.2608068%" x2="-50.1292379%" y2="138.917933%" id="linearGradient-3"><stop stop-color="#FF3A44" offset="0%"></stop><stop stop-color="#C31162" offset="100%"></stop></linearGradient><linearGradient x1="-18.8105628%" y1="-13.9083148%" x2="42.0848536%" y2="34.5841333%" id="linearGradient-4"><stop stop-color="#32A071" offset="0%"></stop><stop stop-color="#2DA771" offset="6.85%"></stop><stop stop-color="#15CF74" offset="47.62%"></stop><stop stop-color="#06E775" offset="80.09%"></stop><stop stop-color="#00F076" offset="100%"></stop></linearGradient></defs><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-165.000000, -1901.000000)"><g transform="translate(0.000000, 1750.000000)"><g id="Download-our-app" transform="translate(165.000000, 121.000000)"><g id="Google_Play_Store_badge_EN" transform="translate(0.000000, 30.000000)"><path d="M96.2913907,30 L3.7049301,30 C1.66298749,30 0,28.3092269 0,26.25 L0,3.75 C0,1.68329177 1.66298749,0 3.7049301,0 L96.2913907,0 C98.3314937,0 99.9963208,1.68329177 99.9963208,3.75 L99.9963208,26.25 C99.9963208,28.3092269 98.3314937,30 96.2913907,30 Z" fill="#000000" fill-rule="nonzero"></path><path d="M96.2913907,0.600374065 C98.0040471,0.600374065 99.4058131,2.01620948 99.4058131,3.75 L99.4058131,26.25 C99.4058131,27.9837905 98.013245,29.3996259 96.2913907,29.3996259 L3.7049301,29.3996259 C1.99227373,29.3996259 0.590507726,27.9837905 0.590507726,26.25 L0.590507726,3.75 C0.590507726,2.01620948 1.98307579,0.600374065 3.7049301,0.600374065 C3.7049301,0.600374065 96.2913907,0.600374065 96.2913907,0.600374065 Z M96.2913907,0 L3.7049301,0 C1.66298749,0 0,1.69077307 0,3.75 L0,26.25 C0,28.3167082 1.66298749,30 3.7049301,30 L96.2913907,30 C98.3314937,30 99.9963208,28.3167082 99.9963208,26.25 L99.9963208,3.75 C99.9963208,1.69077307 98.3314937,0 96.2913907,0 Z" fill="#A6A6A6"></path><path d="M52.67844,9.92394015 C52.0106696,9.92394015 51.4477557,9.68640898 51.0025754,9.21882793 C50.5610743,8.76433915 50.3145695,8.13778055 50.3256071,7.49812968 C50.3256071,6.81546135 50.553716,6.23753117 51.0025754,5.77930175 C51.4459161,5.3117207 52.00883,5.07418953 52.6766004,5.07418953 C53.3370125,5.07418953 53.8999264,5.3117207 54.352465,5.77930175 C54.8013245,6.25249377 55.0294334,6.83042394 55.0294334,7.49812968 C55.0220751,8.18266833 54.7939662,8.7605985 54.352465,9.21695761 C53.9091244,9.6882793 53.3462104,9.92394015 52.67844,9.92394015 Z M32.8090508,9.92394015 C32.1559971,9.92394015 31.589404,9.69014963 31.1258278,9.22817955 C30.6659308,8.7680798 30.4323032,8.18640898 30.4323032,7.5 C30.4323032,6.81359102 30.6659308,6.2319202 31.1258278,5.77182045 C31.580206,5.30985037 32.1467991,5.07605985 32.8090508,5.07605985 C33.1328182,5.07605985 33.4473878,5.1415212 33.7490802,5.27431421 C34.0452539,5.40336658 34.2862399,5.57917706 34.4646799,5.79426434 L34.50883,5.84850374 L34.0103017,6.34600998 L33.9587932,6.28428928 C33.6773363,5.94389027 33.3002208,5.77743142 32.8016924,5.77743142 C32.3565121,5.77743142 31.9683591,5.9382793 31.6482708,6.25623441 C31.3263429,6.57605985 31.1626196,6.99501247 31.1626196,7.50187032 C31.1626196,8.00872818 31.3263429,8.4276808 31.6482708,8.74750623 C31.9683591,9.06546135 32.3565121,9.22630923 32.8016924,9.22630923 C33.2763061,9.22630923 33.6754967,9.06546135 33.986387,8.74750623 C34.1703458,8.56047382 34.2844003,8.29862843 34.3248712,7.96758105 L32.7262693,7.96758105 L32.7262693,7.2680798 L35.0110375,7.2680798 L35.0202355,7.33167082 C35.0367918,7.44950125 35.0533481,7.57107232 35.0533481,7.68329177 C35.0533481,8.32855362 34.8620309,8.85037406 34.4830758,9.23566085 C34.0526122,9.69201995 33.4896983,9.92394015 32.8090508,9.92394015 Z M59.2273731,9.82481297 L58.5228109,9.82481297 L56.3649742,6.31421446 L56.3833701,6.94638404 L56.3833701,9.82294264 L55.6788079,9.82294264 L55.6788079,5.17518703 L56.4827079,5.17518703 L56.5047829,5.21072319 L58.5338484,8.51745636 L58.5154525,7.88715711 L58.5154525,5.17518703 L59.2273731,5.17518703 L59.2273731,9.82481297 L59.2273731,9.82481297 Z M47.384106,9.82481297 L46.6703458,9.82481297 L46.6703458,5.87468828 L45.4323032,5.87468828 L45.4323032,5.17518703 L48.6203091,5.17518703 L48.6203091,5.87468828 L47.3822664,5.87468828 L47.3822664,9.82481297 L47.384106,9.82481297 Z M44.8509934,9.82481297 L44.1390728,9.82481297 L44.1390728,5.17518703 L44.8509934,5.17518703 L44.8509934,9.82481297 Z M40.8498896,9.82481297 L40.1379691,9.82481297 L40.1379691,5.87468828 L38.8999264,5.87468828 L38.8999264,5.17518703 L42.0879323,5.17518703 L42.0879323,5.87468828 L40.8498896,5.87468828 L40.8498896,9.82481297 Z M38.4492274,9.81733167 L35.7192789,9.81733167 L35.7192789,5.17518703 L38.4492274,5.17518703 L38.4492274,5.87468828 L36.433039,5.87468828 L36.433039,7.15024938 L38.2523915,7.15024938 L38.2523915,7.84226933 L36.433039,7.84226933 L36.433039,9.11783042 L38.4492274,9.11783042 L38.4492274,9.81733167 Z M51.5250184,8.73815461 C51.8432671,9.0617207 52.2295806,9.2244389 52.67844,9.2244389 C53.1401766,9.2244389 53.5172921,9.06546135 53.8318617,8.73815461 C54.1445916,8.4201995 54.3027962,8.00311721 54.3027962,7.5 C54.3027962,6.99688279 54.1445916,6.57793017 53.8337013,6.26184539 C53.5154525,5.9382793 53.1272995,5.7755611 52.6802796,5.7755611 C52.218543,5.7755611 51.8414275,5.93453865 51.5286976,6.26184539 C51.2159676,6.5798005 51.0577631,6.99688279 51.0577631,7.5 C51.0577631,8.00311721 51.214128,8.42206983 51.5250184,8.73815461 L51.5250184,8.73815461 Z" fill="#FFFFFF" fill-rule="nonzero"></path><path d="M50.2593819,16.3167082 C48.5209713,16.3167082 47.1118469,17.6577307 47.1118469,19.5074813 C47.1118469,21.340399 48.5301692,22.6982544 50.2593819,22.6982544 C51.9977925,22.6982544 53.4069169,21.3478803 53.4069169,19.5074813 C53.4069169,17.6577307 51.9977925,16.3167082 50.2593819,16.3167082 Z M50.2593819,21.4339152 C49.3083149,21.4339152 48.4896983,20.6334165 48.4896983,19.5 C48.4896983,18.3497506 49.3101545,17.5660848 50.2593819,17.5660848 C51.2104489,17.5660848 52.0290686,18.3497506 52.0290686,19.5 C52.0309051,20.6408978 51.2104489,21.4339152 50.2593819,21.4339152 Z M43.3922001,16.3167082 C41.6537896,16.3167082 40.2446652,17.6577307 40.2446652,19.5074813 C40.2446652,21.340399 41.6629875,22.6982544 43.3922001,22.6982544 C45.1306107,22.6982544 46.5397351,21.3478803 46.5397351,19.5074813 C46.5397351,17.6577307 45.1287712,16.3167082 43.3922001,16.3167082 Z M43.3922001,21.4339152 C42.4411332,21.4339152 41.6225166,20.6334165 41.6225166,19.5 C41.6225166,18.3497506 42.4429728,17.5660848 43.3922001,17.5660848 C44.3432671,17.5660848 45.1618837,18.3497506 45.1618837,19.5 C45.1618837,20.6408978 44.3432671,21.4339152 43.3922001,21.4339152 Z M35.2207506,17.2911471 L35.2207506,18.6415212 L38.4087564,18.6415212 C38.3112583,19.3990025 38.0647535,19.9582294 37.687638,20.3416459 C37.2203826,20.8167082 36.4992642,21.3329177 35.2281089,21.3329177 C33.2689478,21.3329177 31.736571,19.7244389 31.736571,17.7325436 C31.736571,15.7406484 33.2689478,14.1321696 35.2281089,14.1321696 C36.285872,14.1321696 37.0566593,14.5567332 37.6287712,15.0991272 L38.5706402,14.1415212 C37.7759382,13.367207 36.7181751,12.7743142 35.2354673,12.7743142 C32.5478293,12.7743142 30.2924945,15 30.2924945,17.7250623 C30.2924945,20.457606 32.5459897,22.6758105 35.2354673,22.6758105 C36.6869021,22.6758105 37.7759382,22.1932668 38.6368653,21.2842893 C39.5143488,20.3921446 39.7921266,19.1334165 39.7921266,18.1178304 C39.7921266,17.8017456 39.7682119,17.5174564 39.718543,17.2761845 L35.218911,17.2761845 C35.2207506,17.2743142 35.2207506,17.2911471 35.2207506,17.2911471 Z M68.6442237,18.3422693 C68.3811626,17.6259352 67.5864606,16.3092269 65.9565857,16.3092269 C64.3414275,16.3092269 62.9985283,17.6016209 62.9985283,19.5 C62.9985283,21.2917706 64.3267108,22.6907731 66.1129507,22.6907731 C67.5478293,22.6907731 68.3830022,21.7986284 68.7270052,21.2749377 L67.6618837,20.5492519 C67.3086829,21.0822943 66.8175129,21.4320449 66.1203091,21.4320449 C65.4157469,21.4320449 64.9227373,21.1066085 64.5952907,20.4650873 L68.7913907,18.6976309 C68.7913907,18.6995012 68.6442237,18.3422693 68.6442237,18.3422693 Z M64.3653422,19.4083541 C64.3322296,18.1758105 65.3072112,17.5492519 66.004415,17.5492519 C66.5544518,17.5492519 67.0125092,17.8241895 67.1688742,18.2244389 L64.3653422,19.4083541 Z M60.9565857,22.5 L62.3344371,22.5 L62.3344371,13.1259352 L60.9565857,13.1259352 L60.9565857,22.5 Z M58.6938926,17.0255611 L58.6442237,17.0255611 C58.3333333,16.6496259 57.7428256,16.3092269 56.9885946,16.3092269 C55.4231052,16.3092269 53.9808683,17.7100998 53.9808683,19.5093516 C53.9808683,21.3011222 55.4157469,22.6851621 56.9885946,22.6851621 C57.7336277,22.6851621 58.3333333,22.3428928 58.6442237,21.9594763 L58.6938926,21.9594763 L58.6938926,22.4177057 C58.6938926,23.6352868 58.053716,24.2917706 57.0217071,24.2917706 C56.1773363,24.2917706 55.6530537,23.6745636 55.4396615,23.1583541 L54.2420898,23.6670823 C54.5860927,24.5087282 55.5040471,25.5504988 57.0198675,25.5504988 C58.6350258,25.5504988 60.0036792,24.5835411 60.0036792,22.2250623 L60.0036792,16.5 L58.7012509,16.5 L58.7012509,17.0255611 C58.7030905,17.0255611 58.6938926,17.0255611 58.6938926,17.0255611 Z M57.1118469,21.4339152 C56.16078,21.4339152 55.366078,20.6259352 55.366078,19.5093516 C55.366078,18.3834165 56.16078,17.5679551 57.1118469,17.5679551 C58.053716,17.5679551 58.7840324,18.3927681 58.7840324,19.5093516 C58.7932303,20.6259352 58.0555556,21.4339152 57.1118469,21.4339152 Z M75.0956586,13.1259352 L71.8009566,13.1259352 L71.8009566,22.5 L73.1788079,22.5 L73.1788079,18.9501247 L75.0974982,18.9501247 C76.6225166,18.9501247 78.1217807,17.8260599 78.1217807,16.0417706 C78.1217807,14.2574813 76.6280353,13.1259352 75.0956586,13.1259352 Z M75.1361295,17.6408978 L73.1769684,17.6408978 L73.1769684,14.4239401 L75.1361295,14.4239401 C76.1681383,14.4239401 76.7512877,15.2899002 76.7512877,16.032419 C76.7512877,16.7674564 76.16078,17.6408978 75.1361295,17.6408978 Z M83.6442237,16.2998753 C82.6434879,16.2998753 81.611479,16.7506234 81.1846946,17.7325436 L82.406181,18.2487531 C82.6692421,17.7325436 83.1512141,17.5567332 83.66078,17.5567332 C84.3745401,17.5567332 85.0956586,17.9906484 85.1122149,18.7649626 L85.1122149,18.8640898 C84.8657101,18.7219451 84.3248712,18.5049875 83.6773363,18.5049875 C82.3583517,18.5049875 81.0209713,19.2381546 81.0209713,20.6128429 C81.0209713,21.8715711 82.102649,22.6795511 83.3075791,22.6795511 C84.2328918,22.6795511 84.7424577,22.2549875 85.0607064,21.7630923 L85.1103753,21.7630923 L85.1103753,22.4887781 L86.4385578,22.4887781 L86.4385578,18.8977556 C86.4385578,17.2256858 85.2170714,16.2998753 83.6442237,16.2998753 Z M83.4713024,21.4339152 C83.0206034,21.4339152 82.3896247,21.2094763 82.3896247,20.6334165 C82.3896247,19.9077307 83.1769684,19.632793 83.848418,19.632793 C84.455482,19.632793 84.7424577,19.765586 85.1030169,19.9488778 C85.0036792,20.7905237 84.3046358,21.4264339 83.4713024,21.4339152 Z M91.2840324,16.5 L89.7019868,20.5660848 L89.6523179,20.5660848 L88.013245,16.5 L86.5305372,16.5 L88.9900662,22.1839152 L87.5883002,25.3428928 L89.0231788,25.3428928 L92.8072112,16.5 C92.8072112,16.5 91.2840324,16.5 91.2840324,16.5 Z M78.8815305,22.5 L80.2593819,22.5 L80.2593819,13.1259352 L78.8815305,13.1259352 L78.8815305,22.5 Z" fill="#FFFFFF"></path><path d="M7.69683591,5.65024938 C7.48344371,5.8840399 7.36019132,6.24127182 7.36019132,6.70885287 L7.36019132,23.2930175 C7.36019132,23.7605985 7.48344371,24.1178304 7.70419426,24.3422693 L7.76122149,24.3927681 L16.9002943,15.1009975 L16.9002943,14.8933915 L7.75386313,5.59975062 C7.75386313,5.59975062 7.69683591,5.65024938 7.69683591,5.65024938 Z" fill="url(#linearGradient-1)"></path><path d="M19.9411332,18.207606 L16.892936,15.1084788 L16.892936,14.8915212 L19.9411332,11.792394 L20.0073584,11.8335411 L23.6129507,13.9170823 C24.6449595,14.5081047 24.6449595,15.484414 23.6129507,16.0829177 L20.0073584,18.1664589 C20.0073584,18.1664589 19.9411332,18.207606 19.9411332,18.207606 Z" fill="url(#linearGradient-2)"></path><path d="M20.0073584,18.1664589 L16.892936,15 L7.69683591,24.3497506 C8.0334805,24.7163342 8.598234,24.7574813 9.22921266,24.4002494 L20.0073584,18.1664589" fill="url(#linearGradient-3)"></path><path d="M20.0073584,11.8335411 L9.22921266,5.60910224 C8.598234,5.2425187 8.03164091,5.29301746 7.69683591,5.659601 L16.892936,15 L20.0073584,11.8335411 Z" fill="url(#linearGradient-4)"></path><path d="M19.9411332,18.0991272 L9.23657101,24.282419 C8.63870493,24.6321696 8.10522443,24.6078554 7.76122149,24.2899002 L7.70419426,24.3478803 L7.76122149,24.3983791 C8.10522443,24.7144638 8.63870493,24.7406484 9.23657101,24.3908978 L20.0147167,18.1664589 C20.0147167,18.1664589 19.9411332,18.0991272 19.9411332,18.0991272 Z" fill="#000000" fill-rule="nonzero" opacity="0.2"></path><path d="M23.6129507,15.9744389 L19.9319352,18.0991272 L19.9981604,18.1664589 L23.6037528,16.0829177 C24.120677,15.7836658 24.3745401,15.3908978 24.3745401,15 C24.3432671,15.3591022 24.080206,15.6995012 23.6129507,15.9744389 Z" fill="#000000" fill-rule="nonzero" opacity="0.12"></path><path d="M9.22921266,5.71758105 L23.6129507,14.0255611 C24.080206,14.2930175 24.3432671,14.6427681 24.383738,15 C24.383738,14.6091022 24.1298749,14.2163342 23.6129507,13.9170823 L9.22921266,5.60910224 C8.19720383,5.00872818 7.36019132,5.50997506 7.36019132,6.70885287 L7.36019132,6.81733167 C7.36019132,5.61658354 8.19720383,5.12468828 9.22921266,5.71758105 Z" fill="#FFFFFF" opacity="0.25"></path></g></g></g></g></g></svg>
                    </div>
                    <div>
                        <svg width="100" height="30" viewBox="0 0 100 30" version="1.1" xmlns="http://www.w3.org/2000/svg"><title>E4143C4D-D7CE-444B-AEA0-C4C9AB14BB46</title><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-273.000000, -1901.000000)" fill-rule="nonzero"><g transform="translate(0.000000, 1750.000000)"><g transform="translate(165.000000, 121.000000)"><g transform="translate(108.000000, 30.000000)"><path d="M96.4422222,30 L3.50296296,30 C1.57185185,30 0,28.404 0,26.45025 L0,3.5445 C0,1.59 1.57185185,0 3.50296296,0 L96.4422222,0 C98.3725926,0 100,1.59 100,3.5445 L100,26.45025 C100,28.404 98.3725926,30 96.4422222,30 L96.4422222,30 Z" fill="#A6A6A6"></path><path d="M99.282963,26.451 C99.282963,28.038 98.0133333,29.3235 96.442963,29.3235 L3.50296296,29.3235 C1.93333333,29.3235 0.659259259,28.038 0.659259259,26.451 L0.659259259,3.54375 C0.659259259,1.9575 1.93333333,0.6675 3.50296296,0.6675 L96.4422222,0.6675 C98.0133333,0.6675 99.282963,1.9575 99.282963,3.54375 L99.282963,26.451 L99.282963,26.451 Z" fill="#000000"></path><g transform="translate(8.888889, 4.500000)" fill="#FFFFFF"><path d="M13.4281481,10.338 C13.4066667,7.92075 15.382963,6.74475 15.4733333,6.69 C14.3540741,5.03775 12.6192593,4.812 12.0096296,4.794 C10.5525926,4.63875 9.13925926,5.67675 8.39703704,5.67675 C7.64,5.67675 6.49703704,4.809 5.26518519,4.8345 C3.68,4.85925 2.19703704,5.7885 1.3837037,7.2315 C-0.294814815,10.17375 0.957037037,14.4975 2.56518519,16.87575 C3.36962963,18.0405 4.30962963,19.341 5.54,19.29525 C6.7437037,19.245 7.19333333,18.51825 8.64592593,18.51825 C10.0851852,18.51825 10.5074074,19.29525 11.7622222,19.266 C13.0540741,19.245 13.8674074,18.096 14.6437037,16.92075 C15.5733333,15.58575 15.9466667,14.271 15.9614815,14.2035 C15.9311111,14.193 13.4525926,13.23525 13.4281481,10.338 Z"></path><path d="M11.0577778,3.2295 C11.7051852,2.40975 12.1481481,1.2945 12.0251852,0.16275 C11.0881481,0.20475 9.9162963,0.819 9.24148148,1.62075 C8.64444444,2.32725 8.11111111,3.48525 8.24888889,4.57425 C9.30148148,4.65375 10.3822222,4.0365 11.0577778,3.2295 Z"></path></g><g transform="translate(31.111111, 13.500000)" fill="#FFFFFF"><path d="M8.62592593,10.128 L6.9437037,10.128 L6.02222222,7.19625 L2.81925926,7.19625 L1.94148148,10.128 L0.303703704,10.128 L3.47703704,0.147 L5.43703704,0.147 L8.62592593,10.128 Z M5.74444444,5.96625 L4.91111111,3.36 C4.82296296,3.09375 4.65777778,2.46675 4.41407407,1.47975 L4.38444444,1.47975 C4.28740741,1.90425 4.13111111,2.53125 3.9162963,3.36 L3.09777778,5.96625 L5.74444444,5.96625 L5.74444444,5.96625 Z"></path><path d="M16.7866667,6.441 C16.7866667,7.665 16.46,8.6325 15.8066667,9.34275 C15.2214815,9.975 14.4948148,10.29075 13.6274074,10.29075 C12.6911111,10.29075 12.0185185,9.95025 11.6088889,9.26925 L11.5792593,9.26925 L11.5792593,13.0605 L10,13.0605 L10,5.30025 C10,4.53075 9.98,3.741 9.94148148,2.931 L11.3303704,2.931 L11.4185185,4.07175 L11.4481481,4.07175 C11.9748148,3.21225 12.7740741,2.78325 13.8466667,2.78325 C14.6851852,2.78325 15.3851852,3.1185 15.9451852,3.78975 C16.5066667,4.46175 16.7866667,5.34525 16.7866667,6.441 Z M15.1777778,6.4995 C15.1777778,5.799 15.0222222,5.2215 14.7096296,4.767 C14.3681481,4.293 13.9096296,4.056 13.3348148,4.056 C12.9451852,4.056 12.5911111,4.188 12.2748148,4.44825 C11.9577778,4.71075 11.7503704,5.0535 11.6533333,5.478 C11.6044444,5.676 11.58,5.838 11.58,5.9655 L11.58,7.1655 C11.58,7.689 11.7385185,8.13075 12.0555556,8.4915 C12.3725926,8.85225 12.7844444,9.03225 13.2911111,9.03225 C13.8859259,9.03225 14.3488889,8.79975 14.68,8.33625 C15.0118519,7.872 15.1777778,7.26 15.1777778,6.4995 Z"></path><path d="M24.9622222,6.441 C24.9622222,7.665 24.6355556,8.6325 23.9814815,9.34275 C23.397037,9.975 22.6703704,10.29075 21.802963,10.29075 C20.8666667,10.29075 20.1940741,9.95025 19.7851852,9.26925 L19.7555556,9.26925 L19.7555556,13.0605 L18.1762963,13.0605 L18.1762963,5.30025 C18.1762963,4.53075 18.1562963,3.741 18.1177778,2.931 L19.5066667,2.931 L19.5948148,4.07175 L19.6244444,4.07175 C20.1503704,3.21225 20.9496296,2.78325 22.022963,2.78325 C22.8607407,2.78325 23.5607407,3.1185 24.1222222,3.78975 C24.6814815,4.46175 24.9622222,5.34525 24.9622222,6.441 Z M23.3533333,6.4995 C23.3533333,5.799 23.197037,5.2215 22.8844444,4.767 C22.542963,4.293 22.0859259,4.056 21.5103704,4.056 C21.12,4.056 20.7666667,4.188 20.4496296,4.44825 C20.1325926,4.71075 19.9259259,5.0535 19.8288889,5.478 C19.7807407,5.676 19.7555556,5.838 19.7555556,5.9655 L19.7555556,7.1655 C19.7555556,7.689 19.9140741,8.13075 20.2296296,8.4915 C20.5466667,8.8515 20.9585185,9.03225 21.4666667,9.03225 C22.0614815,9.03225 22.5244444,8.79975 22.8555556,8.33625 C23.1874074,7.872 23.3533333,7.26 23.3533333,6.4995 Z"></path><path d="M34.102963,7.329 C34.102963,8.178 33.8118519,8.86875 33.2274074,9.402 C32.5851852,9.98475 31.6911111,10.27575 30.5422222,10.27575 C29.4814815,10.27575 28.6311111,10.06875 27.9874074,9.654 L28.3533333,8.32125 C29.0466667,8.74575 29.8074074,8.95875 30.6362963,8.95875 C31.2311111,8.95875 31.6940741,8.82225 32.0266667,8.55075 C32.3577778,8.27925 32.522963,7.91475 32.522963,7.46025 C32.522963,7.05525 32.3866667,6.714 32.1133333,6.43725 C31.8414815,6.1605 31.3874074,5.90325 30.7533333,5.6655 C29.0274074,5.01375 28.1651852,4.059 28.1651852,2.8035 C28.1651852,1.983 28.4674074,1.31025 29.0725926,0.78675 C29.6755556,0.2625 30.48,0.00075 31.4859259,0.00075 C32.382963,0.00075 33.1281481,0.159 33.722963,0.47475 L33.3281481,1.77825 C32.7725926,1.47225 32.1444444,1.31925 31.4414815,1.31925 C30.8859259,1.31925 30.4518519,1.458 30.1407407,1.734 C29.8777778,1.98075 29.7459259,2.2815 29.7459259,2.63775 C29.7459259,3.03225 29.8962963,3.3585 30.1985185,3.615 C30.4614815,3.852 30.9392593,4.1085 31.6325926,4.38525 C32.4807407,4.731 33.1037037,5.13525 33.5044444,5.59875 C33.9037037,6.06075 34.102963,6.639 34.102963,7.329 Z"></path><path d="M39.3244444,4.131 L37.5837037,4.131 L37.5837037,7.62525 C37.5837037,8.514 37.8903704,8.958 38.5051852,8.958 C38.7874074,8.958 39.0214815,8.93325 39.2066667,8.88375 L39.2503704,10.098 C38.9392593,10.21575 38.5296296,10.275 38.0222222,10.275 C37.3985185,10.275 36.9111111,10.08225 36.5592593,9.6975 C36.2088889,9.312 36.0325926,8.6655 36.0325926,7.75725 L36.0325926,4.1295 L34.9955556,4.1295 L34.9955556,2.9295 L36.0325926,2.9295 L36.0325926,1.61175 L37.5837037,1.13775 L37.5837037,2.9295 L39.3244444,2.9295 L39.3244444,4.131 Z"></path><path d="M47.1785185,6.47025 C47.1785185,7.5765 46.8659259,8.48475 46.2422222,9.195 C45.5881481,9.92625 44.72,10.29075 43.6377778,10.29075 C42.5948148,10.29075 41.7644444,9.9405 41.1451852,9.24 C40.5259259,8.5395 40.2162963,7.65525 40.2162963,6.5895 C40.2162963,5.47425 40.5348148,4.56075 41.1740741,3.8505 C41.8118519,3.1395 42.6725926,2.784 43.7548148,2.784 C44.7977778,2.784 45.637037,3.13425 46.2703704,3.8355 C46.8762963,4.51575 47.1785185,5.394 47.1785185,6.47025 Z M45.54,6.522 C45.54,5.85825 45.4,5.289 45.1162963,4.81425 C44.7851852,4.23975 44.3118519,3.95325 43.6985185,3.95325 C43.0637037,3.95325 42.5814815,4.2405 42.2503704,4.81425 C41.9666667,5.28975 41.8266667,5.868 41.8266667,6.552 C41.8266667,7.21575 41.9666667,7.785 42.2503704,8.259 C42.5918519,8.8335 43.0688889,9.12 43.6844444,9.12 C44.2874074,9.12 44.7607407,8.8275 45.1022222,8.244 C45.3933333,7.76025 45.54,7.185 45.54,6.522 Z"></path><path d="M52.3118519,4.33725 C52.1555556,4.308 51.9888889,4.293 51.8140741,4.293 C51.2585185,4.293 50.8288889,4.50525 50.5266667,4.9305 C50.2637037,5.3055 50.1318519,5.7795 50.1318519,6.35175 L50.1318519,10.128 L48.5533333,10.128 L48.5681481,5.1975 C48.5681481,4.368 48.5481481,3.61275 48.5088889,2.93175 L49.8844444,2.93175 L49.9422222,4.30875 L49.9859259,4.30875 C50.1525926,3.8355 50.4155556,3.4545 50.7755556,3.16875 C51.1274074,2.9115 51.5074074,2.78325 51.917037,2.78325 C52.062963,2.78325 52.1948148,2.79375 52.3118519,2.8125 L52.3118519,4.33725 Z"></path><path d="M59.3748148,6.189 C59.3748148,6.4755 59.3562963,6.717 59.317037,6.91425 L54.5792593,6.91425 C54.5977778,7.62525 54.8266667,8.169 55.2666667,8.544 C55.6659259,8.87925 56.1822222,9.04725 56.8162963,9.04725 C57.5177778,9.04725 58.1577778,8.934 58.7333333,8.70675 L58.9807407,9.81675 C58.3081481,10.11375 57.5140741,10.2615 56.5977778,10.2615 C55.4955556,10.2615 54.6303704,9.933 54.0007407,9.27675 C53.3725926,8.6205 53.0577778,7.73925 53.0577778,6.63375 C53.0577778,5.5485 53.3503704,4.64475 53.9362963,3.924 C54.5496296,3.1545 55.3785185,2.76975 56.4214815,2.76975 C57.4459259,2.76975 58.2214815,3.1545 58.7481481,3.924 C59.1651852,4.53525 59.3748148,5.29125 59.3748148,6.189 Z M57.8688889,5.77425 C57.8792593,5.30025 57.7762963,4.89075 57.5622222,4.545 C57.2888889,4.10025 56.8688889,3.87825 56.3037037,3.87825 C55.7874074,3.87825 55.3674074,4.095 55.0466667,4.53 C54.7837037,4.87575 54.6274074,5.2905 54.5792593,5.7735 L57.8688889,5.7735 L57.8688889,5.77425 Z"></path></g><g id="Group" transform="translate(31.851852, 4.500000)" fill="#FFFFFF"><path d="M4.48148148,3.00675 C4.48148148,3.8895 4.22,4.554 3.69777778,5.00025 C3.21407407,5.412 2.52666667,5.61825 1.6362963,5.61825 C1.19481481,5.61825 0.817037037,5.59875 0.500740741,5.55975 L0.500740741,0.7365 C0.913333333,0.669 1.35777778,0.6345 1.83777778,0.6345 C2.68592593,0.6345 3.32518519,0.82125 3.7562963,1.19475 C4.23925926,1.617 4.48148148,2.22075 4.48148148,3.00675 Z M3.66296296,3.0285 C3.66296296,2.45625 3.51333333,2.0175 3.21407407,1.7115 C2.91481481,1.40625 2.47777778,1.25325 1.90222222,1.25325 C1.65777778,1.25325 1.44962963,1.26975 1.27703704,1.30425 L1.27703704,4.971 C1.37259259,4.986 1.54740741,4.99275 1.80148148,4.99275 C2.39555556,4.99275 2.85407407,4.8255 3.17703704,4.491 C3.5,4.1565 3.66296296,3.669 3.66296296,3.0285 Z"></path><path d="M8.82148148,3.77775 C8.82148148,4.3215 8.66814815,4.767 8.36148148,5.1165 C8.04,5.47575 7.61407407,5.655 7.08222222,5.655 C6.56962963,5.655 6.16148148,5.48325 5.85703704,5.13825 C5.55333333,4.794 5.40148148,4.35975 5.40148148,3.83625 C5.40148148,3.28875 5.55777778,2.8395 5.87185185,2.49075 C6.18592593,2.142 6.60814815,1.96725 7.14,1.96725 C7.65259259,1.96725 8.06444444,2.139 8.3762963,2.48325 C8.67259259,2.81775 8.82148148,3.24975 8.82148148,3.77775 Z M8.0162963,3.80325 C8.0162963,3.477 7.94666667,3.19725 7.80814815,2.964 C7.64518519,2.682 7.41333333,2.541 7.11185185,2.541 C6.8,2.541 6.56296296,2.682 6.4,2.964 C6.26074074,3.19725 6.19185185,3.4815 6.19185185,3.8175 C6.19185185,4.14375 6.26148148,4.4235 6.4,4.65675 C6.56814815,4.93875 6.80222222,5.07975 7.10444444,5.07975 C7.40074074,5.07975 7.63333333,4.9365 7.80074074,4.64925 C7.94444444,4.4115 8.0162963,4.1295 8.0162963,3.80325 Z"></path><path d="M14.6407407,2.03925 L13.5481481,5.57475 L12.837037,5.57475 L12.3844444,4.0395 C12.2696296,3.65625 12.1762963,3.27525 12.1037037,2.89725 L12.0896296,2.89725 C12.0222222,3.28575 11.9288889,3.666 11.8088889,4.0395 L11.3281481,5.57475 L10.6088889,5.57475 L9.58148148,2.03925 L10.3792593,2.03925 L10.7740741,3.72 C10.8696296,4.1175 10.9481481,4.49625 11.0111111,4.85475 L11.0251852,4.85475 C11.082963,4.55925 11.1785185,4.18275 11.3133333,3.7275 L11.8088889,2.04 L12.4414815,2.04 L12.9162963,3.6915 C13.0311111,4.09425 13.1244444,4.482 13.1962963,4.8555 L13.2177778,4.8555 C13.2703704,4.49175 13.3496296,4.104 13.4548148,3.6915 L13.8785185,2.04 L14.6407407,2.04 L14.6407407,2.03925 Z"></path><path d="M18.6651852,5.57475 L17.8888889,5.57475 L17.8888889,3.54975 C17.8888889,2.92575 17.6548148,2.61375 17.1851852,2.61375 C16.9548148,2.61375 16.7688889,2.69925 16.6244444,2.871 C16.4814815,3.04275 16.4088889,3.24525 16.4088889,3.477 L16.4088889,5.574 L15.6325926,5.574 L15.6325926,3.0495 C15.6325926,2.739 15.622963,2.40225 15.6044444,2.03775 L16.2866667,2.03775 L16.322963,2.5905 L16.3444444,2.5905 C16.4348148,2.41875 16.5696296,2.277 16.7466667,2.16375 C16.957037,2.03175 17.1925926,1.965 17.4503704,1.965 C17.7762963,1.965 18.0474074,2.0715 18.262963,2.28525 C18.5311111,2.547 18.6651852,2.93775 18.6651852,3.45675 L18.6651852,5.57475 L18.6651852,5.57475 Z"></path><polygon points="20.8059259 5.57475 20.0303704 5.57475 20.0303704 0.417 20.8059259 0.417"></polygon><path d="M25.3762963,3.77775 C25.3762963,4.3215 25.222963,4.767 24.9162963,5.1165 C24.5948148,5.47575 24.1681481,5.655 23.637037,5.655 C23.1237037,5.655 22.7155556,5.48325 22.4118519,5.13825 C22.1081481,4.794 21.9562963,4.35975 21.9562963,3.83625 C21.9562963,3.28875 22.1125926,2.8395 22.4266667,2.49075 C22.7407407,2.142 23.162963,1.96725 23.6940741,1.96725 C24.2074074,1.96725 24.6185185,2.139 24.9311111,2.48325 C25.2274074,2.81775 25.3762963,3.24975 25.3762963,3.77775 Z M24.5703704,3.80325 C24.5703704,3.477 24.5007407,3.19725 24.3622222,2.964 C24.2,2.682 23.9674074,2.541 23.6666667,2.541 C23.3540741,2.541 23.117037,2.682 22.9548148,2.964 C22.8155556,3.19725 22.7466667,3.4815 22.7466667,3.8175 C22.7466667,4.14375 22.8162963,4.4235 22.9548148,4.65675 C23.122963,4.93875 23.357037,5.07975 23.6592593,5.07975 C23.9555556,5.07975 24.1874074,4.9365 24.3548148,4.64925 C24.4992593,4.4115 24.5703704,4.1295 24.5703704,3.80325 Z"></path><path d="M29.1333333,5.57475 L28.4362963,5.57475 L28.3785185,5.1675 L28.357037,5.1675 C28.1185185,5.49225 27.7785185,5.655 27.337037,5.655 C27.0074074,5.655 26.7407407,5.54775 26.54,5.33475 C26.3577778,5.14125 26.2666667,4.9005 26.2666667,4.61475 C26.2666667,4.18275 26.4444444,3.8535 26.8022222,3.6255 C27.1592593,3.3975 27.6614815,3.28575 28.3081481,3.291 L28.3081481,3.225 C28.3081481,2.75925 28.0666667,2.52675 27.582963,2.52675 C27.2385185,2.52675 26.9348148,2.6145 26.6725926,2.7885 L26.5148148,2.2725 C26.8392593,2.06925 27.24,1.96725 27.7125926,1.96725 C28.6251852,1.96725 29.082963,2.45475 29.082963,3.42975 L29.082963,4.73175 C29.082963,5.085 29.1,5.36625 29.1333333,5.57475 Z M28.3274074,4.35975 L28.3274074,3.8145 C27.4711111,3.7995 27.042963,4.03725 27.042963,4.527 C27.042963,4.7115 27.0918519,4.8495 27.1918519,4.94175 C27.2918519,5.034 27.4192593,5.07975 27.5711111,5.07975 C27.7414815,5.07975 27.9007407,5.025 28.0459259,4.91625 C28.1918519,4.80675 28.2814815,4.668 28.3148148,4.49775 C28.322963,4.4595 28.3274074,4.413 28.3274074,4.35975 Z"></path><path d="M33.5444444,5.57475 L32.8555556,5.57475 L32.8192593,5.007 L32.7977778,5.007 C32.5777778,5.439 32.202963,5.655 31.6762963,5.655 C31.2555556,5.655 30.9051852,5.48775 30.6274074,5.15325 C30.3496296,4.81875 30.2111111,4.3845 30.2111111,3.85125 C30.2111111,3.279 30.3614815,2.8155 30.6637037,2.4615 C30.9562963,2.1315 31.3148148,1.9665 31.7414815,1.9665 C32.2103704,1.9665 32.5385185,2.12625 32.7251852,2.4465 L32.74,2.4465 L32.74,0.417 L33.517037,0.417 L33.517037,4.62225 C33.517037,4.9665 33.5259259,5.28375 33.5444444,5.57475 Z M32.74,4.08375 L32.74,3.49425 C32.74,3.39225 32.7325926,3.30975 32.7185185,3.24675 C32.6748148,3.05775 32.5807407,2.89875 32.4377778,2.7705 C32.2933333,2.64225 32.1192593,2.57775 31.9185185,2.57775 C31.6288889,2.57775 31.4022222,2.694 31.2355556,2.92725 C31.0703704,3.1605 30.9866667,3.45825 30.9866667,3.822 C30.9866667,4.1715 31.0659259,4.455 31.2251852,4.67325 C31.3933333,4.90575 31.62,5.022 31.9037037,5.022 C32.1585185,5.022 32.3622222,4.92525 32.517037,4.731 C32.6666667,4.55175 32.74,4.33575 32.74,4.08375 Z"></path><path d="M40.1837037,3.77775 C40.1837037,4.3215 40.0303704,4.767 39.7237037,5.1165 C39.4022222,5.47575 38.977037,5.655 38.4444444,5.655 C37.9325926,5.655 37.5244444,5.48325 37.2192593,5.13825 C36.9155556,4.794 36.7637037,4.35975 36.7637037,3.83625 C36.7637037,3.28875 36.92,2.8395 37.2340741,2.49075 C37.5481481,2.142 37.9703704,1.96725 38.502963,1.96725 C39.0148148,1.96725 39.4274074,2.139 39.7385185,2.48325 C40.0348148,2.81775 40.1837037,3.24975 40.1837037,3.77775 Z M39.3792593,3.80325 C39.3792593,3.477 39.3096296,3.19725 39.1711111,2.964 C39.0074074,2.682 38.7762963,2.541 38.4740741,2.541 C38.162963,2.541 37.9259259,2.682 37.7622222,2.964 C37.622963,3.19725 37.5540741,3.4815 37.5540741,3.8175 C37.5540741,4.14375 37.6237037,4.4235 37.7622222,4.65675 C37.9303704,4.93875 38.1644444,5.07975 38.4666667,5.07975 C38.762963,5.07975 38.9962963,4.9365 39.1637037,4.64925 C39.3066667,4.4115 39.3792593,4.1295 39.3792593,3.80325 Z"></path><path d="M44.3577778,5.57475 L43.5822222,5.57475 L43.5822222,3.54975 C43.5822222,2.92575 43.3481481,2.61375 42.8777778,2.61375 C42.6474074,2.61375 42.4614815,2.69925 42.3177778,2.871 C42.1740741,3.04275 42.1022222,3.24525 42.1022222,3.477 L42.1022222,5.574 L41.3251852,5.574 L41.3251852,3.0495 C41.3251852,2.739 41.3162963,2.40225 41.2977778,2.03775 L41.9792593,2.03775 L42.0155556,2.5905 L42.037037,2.5905 C42.1281481,2.41875 42.262963,2.277 42.4392593,2.16375 C42.6503704,2.03175 42.8851852,1.965 43.1437037,1.965 C43.4688889,1.965 43.74,2.0715 43.9555556,2.28525 C44.2244444,2.547 44.3577778,2.93775 44.3577778,3.45675 L44.3577778,5.57475 L44.3577778,5.57475 Z"></path><path d="M49.5822222,2.628 L48.7274074,2.628 L48.7274074,4.3455 C48.7274074,4.782 48.8792593,5.00025 49.18,5.00025 C49.3192593,5.00025 49.4348148,4.98825 49.5259259,4.9635 L49.5459259,5.55975 C49.3925926,5.61825 49.1911111,5.6475 48.942963,5.6475 C48.6362963,5.6475 48.3977778,5.553 48.2251852,5.364 C48.0518519,5.175 47.9659259,4.857 47.9659259,4.41075 L47.9659259,2.628 L47.4555556,2.628 L47.4555556,2.03925 L47.9659259,2.03925 L47.9659259,1.39125 L48.7266667,1.15875 L48.7266667,2.0385 L49.5814815,2.0385 L49.5814815,2.628 L49.5822222,2.628 Z"></path><path d="M53.6918519,5.57475 L52.9148148,5.57475 L52.9148148,3.56475 C52.9148148,2.931 52.6807407,2.61375 52.2118519,2.61375 C51.8518519,2.61375 51.6059259,2.7975 51.4711111,3.165 C51.4481481,3.24225 51.4348148,3.33675 51.4348148,3.44775 L51.4348148,5.574 L50.6592593,5.574 L50.6592593,0.417 L51.4348148,0.417 L51.4348148,2.54775 L51.4496296,2.54775 C51.6940741,2.16 52.0444444,1.9665 52.4985185,1.9665 C52.82,1.9665 53.0859259,2.073 53.297037,2.28675 C53.56,2.553 53.6918519,2.949 53.6918519,3.4725 L53.6918519,5.57475 L53.6918519,5.57475 Z"></path><path d="M57.9311111,3.63975 C57.9311111,3.78075 57.9207407,3.89925 57.9022222,3.996 L55.5740741,3.996 C55.5844444,4.3455 55.6955556,4.61175 55.9111111,4.79625 C56.1081481,4.96125 56.3622222,5.04375 56.6733333,5.04375 C57.0177778,5.04375 57.3318519,4.98825 57.6148148,4.8765 L57.7362963,5.4225 C57.4051852,5.568 57.0155556,5.64075 56.5644444,5.64075 C56.0237037,5.64075 55.5977778,5.4795 55.2896296,5.157 C54.98,4.8345 54.8266667,4.40175 54.8266667,3.85875 C54.8266667,3.3255 54.9696296,2.8815 55.2577778,2.5275 C55.5585185,2.1495 55.9651852,1.9605 56.4785185,1.9605 C56.9807407,1.9605 57.3622222,2.1495 57.62,2.5275 C57.8281481,2.8275 57.9311111,3.19875 57.9311111,3.63975 Z M57.1903704,3.4365 C57.1962963,3.20325 57.1451852,3.00225 57.04,2.83275 C56.9051852,2.6145 56.7,2.505 56.4222222,2.505 C56.1688889,2.505 55.9622222,2.6115 55.8044444,2.82525 C55.6755556,2.9955 55.5992593,3.19875 55.5740741,3.4365 L57.1903704,3.4365 Z"></path></g></g></g></g></g></g></svg>
                    </div>
                </div>
             </div>
         </div>
         <div class="copy-right flex justify-between py-6">
            <div class="copy-right">جميع الحقوق محفوطه 2021</div>
            <div class="social-media text-md flex gap-x-3">
                <i class="fab fa-facebook-f text-blue-600"></i>
                <i class="fab fa-twitter text-blue-300"></i>
                <i class="fab fa-linkedin text-blue-900"></i>
                <i class="fab fa-instagram text-purple-700"></i>
            </div>
         </div>
    </div>

</div>
{{-- <div class="container lg:w-2/3 mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <h1 class="text-center mb-5 text-lg">مرحبا بك في موقع اعلانات ونقاط</h1>

             <div class="flex justify-center items-start bg-white shadow-lg px-3 py-3 max-h-screen h-96">
                 @if (!auth()->user()->profile)
                    <button class="button button-blue mx-5 focus:outline-none">
                        <a href="{{ route('profile.create') }}"> اضافة ملف</a>
                    </button>
                  @else
                  <button class="button button-blue mx-5 focus:outline-none">
                    <a href="{{ route('profile.edit',[auth()->user()->profile->user->slug]) }}">تحديث الملف </a>
                 </button>
                 @endif
                 <button class="button button-green mx-5 focus:outline-none">
                    <a href="{{ route('post.create') }}"> اعلان</a>
                 </button>
                 <button class="button button-darkgreen mx-5 focus:outline-none">
                    <a href="{{ route('explore.index') }}"> الاعضاء</a>
                 </button>
                 <button class="button  button-yellow mx-5 focus:outline-none">
                    <a href="{{ route('post.index') }}"> الاعلانات</a>
                 </button>
             </div>
        </div>
    </div>
</div> --}}
@endsection
