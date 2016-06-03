
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console_Commands" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console/Commands.html">Commands</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Commands_Inspire" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Console/Commands/Inspire.html">Inspire</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Events" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Events.html">Events</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Events_Event" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Events/Event.html">Event</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_AuthController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/AuthController.html">AuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_PasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/PasswordController.html">PasswordController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_CarrerController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/CarrerController.html">CarrerController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_CarrerEventController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/CarrerEventController.html">CarrerEventController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_CarrerNoticiaController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/CarrerNoticiaController.html">CarrerNoticiaController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_EventController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/EventController.html">EventController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_FotoController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/FotoController.html">FotoController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_NoticiaController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/NoticiaController.html">NoticiaController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_SocialAuthController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/SocialAuthController.html">SocialAuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_TipusEventController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/TipusEventController.html">TipusEventController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_Authenticate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Authenticate.html">Authenticate</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_Language" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/Language.html">Language</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Requests" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Requests.html">Requests</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Requests_Request" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Requests/Request.html">Request</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Jobs" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Jobs.html">Jobs</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Jobs_Job" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Jobs/Job.html">Job</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Carrer" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Carrer.html">Carrer</a>                    </div>                </li>                            <li data-name="class:App_Event" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Event.html">Event</a>                    </div>                </li>                            <li data-name="class:App_Foto" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Foto.html">Foto</a>                    </div>                </li>                            <li data-name="class:App_Noticia" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Noticia.html">Noticia</a>                    </div>                </li>                            <li data-name="class:App_TipusEvent" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/TipusEvent.html">TipusEvent</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                            <li data-name="class:App_Utils" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Utils.html">Utils</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/Console/Commands.html", "name": "App\\Console\\Commands", "doc": "Namespace App\\Console\\Commands"},{"type": "Namespace", "link": "App/Events.html", "name": "App\\Events", "doc": "Namespace App\\Events"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Http/Requests.html", "name": "App\\Http\\Requests", "doc": "Namespace App\\Http\\Requests"},{"type": "Namespace", "link": "App/Jobs.html", "name": "App\\Jobs", "doc": "Namespace App\\Jobs"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Carrer.html", "name": "App\\Carrer", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Carrer", "fromLink": "App/Carrer.html", "link": "App/Carrer.html#method_user", "name": "App\\Carrer::user", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Carrer", "fromLink": "App/Carrer.html", "link": "App/Carrer.html#method_event", "name": "App\\Carrer::event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Carrer", "fromLink": "App/Carrer.html", "link": "App/Carrer.html#method_noticia", "name": "App\\Carrer::noticia", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Carrer", "fromLink": "App/Carrer.html", "link": "App/Carrer.html#method_foto", "name": "App\\Carrer::foto", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Console\\Commands", "fromLink": "App/Console/Commands.html", "link": "App/Console/Commands/Inspire.html", "name": "App\\Console\\Commands\\Inspire", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Commands\\Inspire", "fromLink": "App/Console/Commands/Inspire.html", "link": "App/Console/Commands/Inspire.html#method_handle", "name": "App\\Console\\Commands\\Inspire::handle", "doc": "&quot;Execute the console command.&quot;"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Event.html", "name": "App\\Event", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Event", "fromLink": "App/Event.html", "link": "App/Event.html#method_tipus_event", "name": "App\\Event::tipus_event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Event", "fromLink": "App/Event.html", "link": "App/Event.html#method_user", "name": "App\\Event::user", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Event", "fromLink": "App/Event.html", "link": "App/Event.html#method_carrer", "name": "App\\Event::carrer", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Events", "fromLink": "App/Events.html", "link": "App/Events/Event.html", "name": "App\\Events\\Event", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Foto.html", "name": "App\\Foto", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Foto", "fromLink": "App/Foto.html", "link": "App/Foto.html#method_carrer", "name": "App\\Foto::carrer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Foto", "fromLink": "App/Foto.html", "link": "App/Foto.html#method_noticia", "name": "App\\Foto::noticia", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/AuthController.html", "name": "App\\Http\\Controllers\\Auth\\AuthController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\AuthController", "fromLink": "App/Http/Controllers/Auth/AuthController.html", "link": "App/Http/Controllers/Auth/AuthController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\AuthController::__construct", "doc": "&quot;Create a new authentication controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/PasswordController.html", "name": "App\\Http\\Controllers\\Auth\\PasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\PasswordController", "fromLink": "App/Http/Controllers/Auth/PasswordController.html", "link": "App/Http/Controllers/Auth/PasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\PasswordController::__construct", "doc": "&quot;Create a new password controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/CarrerController.html", "name": "App\\Http\\Controllers\\CarrerController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_llista", "name": "App\\Http\\Controllers\\CarrerController::llista", "doc": "&quot;M\u00e8tode que retorna una vista amb el llistat de tots els carrers&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_index", "name": "App\\Http\\Controllers\\CarrerController::index", "doc": "&quot;M\u00e8tode que ens retorna un llistat de tots els carrers en format json&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_show", "name": "App\\Http\\Controllers\\CarrerController::show", "doc": "&quot;M\u00e8tode que ens retorna l&#039;informacio d&#039;un carrer determinat en format jsopn&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_edit", "name": "App\\Http\\Controllers\\CarrerController::edit", "doc": "&quot;M\u00e8tode que ens retorna una vista amb el formulari per a editar l&#039;informaci\u00f3 d&#039;un carrer predeterminat&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_update", "name": "App\\Http\\Controllers\\CarrerController::update", "doc": "&quot;M\u00e8tode que a partir d&#039;un id actualitza les dades d&#039;un carrer&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_delete", "name": "App\\Http\\Controllers\\CarrerController::delete", "doc": "&quot;M\u00e8tode que donat un id elimina un carrer&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_afegirFotoForm", "name": "App\\Http\\Controllers\\CarrerController::afegirFotoForm", "doc": "&quot;M\u00e8tode que ens retorna una vista amb el formulari per a poder afegir fotos per un carrer&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_afegirFoto", "name": "App\\Http\\Controllers\\CarrerController::afegirFoto", "doc": "&quot;M\u00e9tode que ens permet emmagatzemar fotos per a un carrer determinat&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerController", "fromLink": "App/Http/Controllers/CarrerController.html", "link": "App/Http/Controllers/CarrerController.html#method_carrerfoto", "name": "App\\Http\\Controllers\\CarrerController::carrerfoto", "doc": "&quot;M\u00e8tode que ens retorna un array amb els identificadors de les 12 fotos mes recents per a un carrer determinat&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/CarrerEventController.html", "name": "App\\Http\\Controllers\\CarrerEventController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerEventController", "fromLink": "App/Http/Controllers/CarrerEventController.html", "link": "App/Http/Controllers/CarrerEventController.html#method_index", "name": "App\\Http\\Controllers\\CarrerEventController::index", "doc": "&quot;M\u00e8tode que retorna tots els events per a un carrer determinat en format JSon&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerEventController", "fromLink": "App/Http/Controllers/CarrerEventController.html", "link": "App/Http/Controllers/CarrerEventController.html#method_show", "name": "App\\Http\\Controllers\\CarrerEventController::show", "doc": "&quot;M\u00e8tode que ens retorna un event en concret per a un carrer concret en format JSon&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/CarrerNoticiaController.html", "name": "App\\Http\\Controllers\\CarrerNoticiaController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerNoticiaController", "fromLink": "App/Http/Controllers/CarrerNoticiaController.html", "link": "App/Http/Controllers/CarrerNoticiaController.html#method_index", "name": "App\\Http\\Controllers\\CarrerNoticiaController::index", "doc": "&quot;M\u00e8tode que ens retorna totes les noticies per a un carrer determinat en format JSon&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\CarrerNoticiaController", "fromLink": "App/Http/Controllers/CarrerNoticiaController.html", "link": "App/Http/Controllers/CarrerNoticiaController.html#method_show", "name": "App\\Http\\Controllers\\CarrerNoticiaController::show", "doc": "&quot;M\u00e8tode que ens retorna una noticia en concret per a un carrer en concret en format JSon&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/EventController.html", "name": "App\\Http\\Controllers\\EventController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_llistapen", "name": "App\\Http\\Controllers\\EventController::llistapen", "doc": "&quot;M\u00e8tode que ens retorna una vista amb tots els events els quals es troben inactius&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_llista", "name": "App\\Http\\Controllers\\EventController::llista", "doc": "&quot;M\u00e9tode que ens retorna una vista  tots els events&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_index", "name": "App\\Http\\Controllers\\EventController::index", "doc": "&quot;M\u00e8tode que ens retorna tots els events existents en format JSon&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_create", "name": "App\\Http\\Controllers\\EventController::create", "doc": "&quot;M\u00e8tode que ens permet emmagatzemar un event en base de dades&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_show", "name": "App\\Http\\Controllers\\EventController::show", "doc": "&quot;M\u00e8tode que ens retorna un event donat el seu identificador en format JSon&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_update", "name": "App\\Http\\Controllers\\EventController::update", "doc": "&quot;M\u00e8tode que ens permet actualitzar l&#039;informacio d&#039;un event donat el seu identificador&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_store", "name": "App\\Http\\Controllers\\EventController::store", "doc": "&quot;M\u00e8tode que ens permet emmagatzemar un event&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_destroy", "name": "App\\Http\\Controllers\\EventController::destroy", "doc": "&quot;M\u00e8tode que ens permet eliminar un event donat un identificador&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_edit", "name": "App\\Http\\Controllers\\EventController::edit", "doc": "&quot;M\u00e8tode que ens retorna una vista per a actualitzar les dades d&#039;un event donat el seu identificador&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_searchmap", "name": "App\\Http\\Controllers\\EventController::searchmap", "doc": "&quot;Retorna la vista d&#039;el buscador d&#039;events&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\EventController", "fromLink": "App/Http/Controllers/EventController.html", "link": "App/Http/Controllers/EventController.html#method_search", "name": "App\\Http\\Controllers\\EventController::search", "doc": "&quot;M\u00e8tode que ens retorna els event&#039;s donats els parametres de b\u00fasqueda (dies, carrers, i tipus d&#039;event)&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/FotoController.html", "name": "App\\Http\\Controllers\\FotoController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\FotoController", "fromLink": "App/Http/Controllers/FotoController.html", "link": "App/Http/Controllers/FotoController.html#method_find", "name": "App\\Http\\Controllers\\FotoController::find", "doc": "&quot;M\u00e8tode que ens retorna una vista amb una foto determinada donat el seu identificador&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/NoticiaController.html", "name": "App\\Http\\Controllers\\NoticiaController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_create", "name": "App\\Http\\Controllers\\NoticiaController::create", "doc": "&quot;Metode que ens retorna el formulari per a la creaci\u00f3 d&#039;una nova not\u00edcia&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_llistapen", "name": "App\\Http\\Controllers\\NoticiaController::llistapen", "doc": "&quot;Metode que retorna la llista de noticies pendents&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_llista", "name": "App\\Http\\Controllers\\NoticiaController::llista", "doc": "&quot;Metode que retorna el llistat de totes les noticies&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_index", "name": "App\\Http\\Controllers\\NoticiaController::index", "doc": "&quot;Metode que ens retorna totes les noticies existents a la base de dades&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_show", "name": "App\\Http\\Controllers\\NoticiaController::show", "doc": "&quot;Metode que ens retorna una noticia donat un identificador&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_update", "name": "App\\Http\\Controllers\\NoticiaController::update", "doc": "&quot;Metode que ens permet actualitzar una noticia donat el seu identificador&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_store", "name": "App\\Http\\Controllers\\NoticiaController::store", "doc": "&quot;Metode que ens permet crear una nova noticia a la base de dades, i compartirla a facebook i twitter&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_destroy", "name": "App\\Http\\Controllers\\NoticiaController::destroy", "doc": "&quot;Metode que ens permet eliminar una noticia donat un identificador&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_edit", "name": "App\\Http\\Controllers\\NoticiaController::edit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_noticies", "name": "App\\Http\\Controllers\\NoticiaController::noticies", "doc": "&quot;Metode per obtenir totes les noticies paginades&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_home", "name": "App\\Http\\Controllers\\NoticiaController::home", "doc": "&quot;M\u00e8tode que ens retona la vista de la pagina principal&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\NoticiaController", "fromLink": "App/Http/Controllers/NoticiaController.html", "link": "App/Http/Controllers/NoticiaController.html#method_showNoticia", "name": "App\\Http\\Controllers\\NoticiaController::showNoticia", "doc": "&quot;M\u00e8tode que ens retorna la vista per a una noticia amb un identificador concret&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/SocialAuthController.html", "name": "App\\Http\\Controllers\\SocialAuthController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\SocialAuthController", "fromLink": "App/Http/Controllers/SocialAuthController.html", "link": "App/Http/Controllers/SocialAuthController.html#method_redirect", "name": "App\\Http\\Controllers\\SocialAuthController::redirect", "doc": "&quot;m\u00e8tode que redirigeix al driver de facebook de Socialite per demanar el token de login&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\SocialAuthController", "fromLink": "App/Http/Controllers/SocialAuthController.html", "link": "App/Http/Controllers/SocialAuthController.html#method_callback", "name": "App\\Http\\Controllers\\SocialAuthController::callback", "doc": "&quot;m\u00e8tode que rep el callback de facebook i recupera l&#039;objecte User per poder publicar&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/TipusEventController.html", "name": "App\\Http\\Controllers\\TipusEventController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_index", "name": "App\\Http\\Controllers\\TipusEventController::index", "doc": "&quot;M\u00e8tode que ens retorna tots els tipus d&#039;events en format JSon&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_show", "name": "App\\Http\\Controllers\\TipusEventController::show", "doc": "&quot;M\u00e8tode que ens retorna un t\u00edpus d&#039;event donat un identificador en format JSon&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_update", "name": "App\\Http\\Controllers\\TipusEventController::update", "doc": "&quot;M\u00e8tode que ens permet actualitzar l&#039;informaci\u00f3 d&#039;un tipus d&#039;event donat un identificador en concret&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_store", "name": "App\\Http\\Controllers\\TipusEventController::store", "doc": "&quot;M\u00e8tode que ens permet emmagatzemar un tipus d&#039;event en base de dades&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_destroy", "name": "App\\Http\\Controllers\\TipusEventController::destroy", "doc": "&quot;M\u00e8tode que ens permet eliminar un tipus d&#039;event donat un identificador concret&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_create", "name": "App\\Http\\Controllers\\TipusEventController::create", "doc": "&quot;M\u00e8tode que ens retorna una vista amb un formulari per a poder crear un tipus d&#039;event&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_llista", "name": "App\\Http\\Controllers\\TipusEventController::llista", "doc": "&quot;M\u00e8tode que ens retorna una vista amb un llistat de tots els tipus d&#039;events&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\TipusEventController", "fromLink": "App/Http/Controllers/TipusEventController.html", "link": "App/Http/Controllers/TipusEventController.html#method_edit", "name": "App\\Http\\Controllers\\TipusEventController::edit", "doc": "&quot;M\u00e8tode que ens retorna una vista amb un formulari per a modificar un tipus d&#039;event donat el seu identificador&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Authenticate.html", "name": "App\\Http\\Middleware\\Authenticate", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Authenticate", "fromLink": "App/Http/Middleware/Authenticate.html", "link": "App/Http/Middleware/Authenticate.html#method_handle", "name": "App\\Http\\Middleware\\Authenticate::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/Language.html", "name": "App\\Http\\Middleware\\Language", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\Language", "fromLink": "App/Http/Middleware/Language.html", "link": "App/Http/Middleware/Language.html#method_handle", "name": "App\\Http\\Middleware\\Language::handle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Requests", "fromLink": "App/Http/Requests.html", "link": "App/Http/Requests/Request.html", "name": "App\\Http\\Requests\\Request", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Jobs", "fromLink": "App/Jobs.html", "link": "App/Jobs/Job.html", "name": "App\\Jobs\\Job", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Noticia.html", "name": "App\\Noticia", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Noticia", "fromLink": "App/Noticia.html", "link": "App/Noticia.html#method_user", "name": "App\\Noticia::user", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Noticia", "fromLink": "App/Noticia.html", "link": "App/Noticia.html#method_carrer", "name": "App\\Noticia::carrer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Noticia", "fromLink": "App/Noticia.html", "link": "App/Noticia.html#method_foto", "name": "App\\Noticia::foto", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any application authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any other events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/TipusEvent.html", "name": "App\\TipusEvent", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\TipusEvent", "fromLink": "App/TipusEvent.html", "link": "App/TipusEvent.html#method_event", "name": "App\\TipusEvent::event", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_carrer", "name": "App\\User::carrer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_event", "name": "App\\User::event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_noticia", "name": "App\\User::noticia", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Utils.html", "name": "App\\Utils", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Utils", "fromLink": "App/Utils.html", "link": "App/Utils.html#method_date_formater", "name": "App\\Utils::date_formater", "doc": "&quot;Funci\u00f3 que rep una data (dd\/mm\/yyyy) i una hora (dd:mm) i la formateja en formate date apte per la Base de Dades&quot;"},
                    {"type": "Method", "fromName": "App\\Utils", "fromLink": "App/Utils.html", "link": "App/Utils.html#method_separate_date", "name": "App\\Utils::separate_date", "doc": "&quot;Funci\u00f3 per separar la data de yyyy-mm-dd hh:mm:ss a una data dd\/mm\/yyyy i una hora hh:mm&quot;"},
                    {"type": "Method", "fromName": "App\\Utils", "fromLink": "App/Utils.html", "link": "App/Utils.html#method_editImage", "name": "App\\Utils::editImage", "doc": "&quot;Metode que donat un fitxer o una imatge provinent d&#039;el request ens l&#039;escala, rota i retalla segons els parametres donats, els quals tambe venen del request&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


