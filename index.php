<?php 
    include_once('config.php');
    session_start();
?>

<html class="h-full bg-gray-50">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>

   </head>
   <body class="h-full">
       <!-- NAVIGATION SECTION START -->
      <div class="relative pt-6 pb-16 sm:pb-6">
         <div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
               <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
                  <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                     <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="#">
                        <span class="sr-only">Workflow</span>
                        <img class="h-8 w-auto sm:h-10" src="assets/logo.png" alt="">
                        </a>
                        <div class="-mr-2 flex items-center md:hidden">
                           <button type="button" class="open-mobile-menu bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                              <span class="sr-only">Open main menu</span>
                              <!-- Heroicon name: outline/menu -->
                              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                              </svg>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="hidden md:flex md:space-x-10">
                     <a href="index.php" class="font-medium text-gray-500 hover:text-gray-900">Strona główna</a>
                     <?php 
                            if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){ 
                               echo '<a href="list.php" class="font-medium text-gray-500 hover:text-gray-900">Lista rezerwacji (admin)</a>';
                            };
                    ?>
                    <?php 
                            if(isset($_SESSION['username'])){ 
                               echo '<a href="#reservation-section" class="font-medium text-gray-500 hover:text-gray-900">Nowa wizyta</a>
                               <a href="#users-reservations" class="font-medium text-gray-500 hover:text-gray-900">Twoje wizyty</a>';
                            };
                    ?>
                  </div>
                  <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                     <span class="inline-flex rounded-md shadow">
                        <?php 
                           if(isset($_SESSION['username'])){
                           ?>
                        <p>
                           <span class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md bg-white">Hi, <?php echo $_SESSION['username'] ?> ! </span>
                           <a href="inc/logout.inc.php" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                           Log out
                           </a>
                        </p>
                        <?php 
                           }else{
                           ?>
                        <div id="login-button-scroll"> <a class="cursor-pointer inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                        Log in
                        </a></div>
                        <?php 
                           }
                           ?>
                     </span>
                  </div>
               </nav>
            </div>
            <div class="mobile-menu absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden hidden">
               <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                  <div class="px-5 pt-4 flex items-center justify-between">
                     <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                     </div>
                     <div class="-mr-2">
                        <button type="button" class="close-mobile-menu bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                           <span class="sr-only">Close menu</span>
                           <!-- Heroicon name: outline/x -->
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="px-2 pt-2 pb-3">
                     <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Product</a>
                     <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Features</a>
                     <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Marketplace</a>
                     <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Company</a>
                  </div>
                  <a href="#" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                  Log in
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- NAVIGATION SECTION START -->

<div class="relative bg-white">
    <div class="lg:absolute lg:inset-0">
      <div class="lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/2">
        <img loading="lazy" class="h-56 w-full object-cover lg:absolute lg:h-full" src="https://images.unsplash.com/photo-1582771498000-8ad44e6c84db?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" alt="">
      </div>
    </div>
    <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:grid lg:grid-cols-2">
      <div class="lg:col-start-2 lg:pl-8">
        <div class="text-base max-w-prose mx-auto lg:max-w-lg lg:ml-auto lg:mr-0">
          <h2 class="leading-6 text-indigo-600 font-semibold tracking-wide uppercase">About us</h2>
          <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Barber's life.</h3>
          <p class="mt-8 text-lg text-gray-500">Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi.</p>
          <div class="mt-5 prose prose-indigo text-gray-500">
            <p>Sollicitudin tristique eros erat odio sed vitae, consequat turpis elementum. Lorem nibh vel, eget pretium arcu vitae. Eros eu viverra donec ut volutpat donec laoreet quam urna.</p>
            <p>Bibendum eu nulla feugiat justo, elit adipiscing. Ut tristique sit nisi lorem pulvinar. Urna, laoreet fusce nibh leo. Dictum et et et sit. Faucibus sed non gravida lectus dignissim imperdiet a.</p>
            <p>Dictum magnis risus phasellus vitae quam morbi. Quis lorem lorem arcu, metus, egestas netus cursus. In.</p>
            <ul role="list">
              <li>Quis elit egestas venenatis mattis dignissim.</li>
              <li>Cras cras lobortis vitae vivamus ultricies facilisis tempus.</li>
              <li>Orci in sit morbi dignissim metus diam arcu pretium.</li>
            </ul>
            <p>Rhoncus nisl, libero egestas diam fermentum dui. At quis tincidunt vel ultricies. Vulputate aliquet velit faucibus semper. Pellentesque in venenatis vestibulum consectetur nibh id. In id ut tempus egestas. Enim sit aliquam nec, a. Morbi enim fermentum lacus in. Viverra.</p>
            <h3>How we’re different</h3>
            <p>Tincidunt integer commodo, cursus etiam aliquam neque, et. Consectetur pretium in volutpat, diam. Montes, magna cursus nulla feugiat dignissim id lobortis amet. Laoreet sem est phasellus eu proin massa, lectus. Diam rutrum posuere donec ultricies non morbi. Mi a platea auctor mi.</p>
            <p>Mauris ullamcorper imperdiet nec egestas mi quis quam ante vulputate. Vel faucibus adipiscing lacus, eget. Nunc fermentum id tellus donec. Ut metus odio sit sit varius non nunc orci. Eu, mi neque, ornare suspendisse amet, nibh. Facilisi volutpat lectus id sapien dis mauris rhoncus. Est rhoncus, interdum imperdiet ac eros, diam mauris, tortor. Risus id sit molestie magna.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php 
        if(isset($_SESSION['username'])){
    ?>

            <div id="users-reservations">
    <?php 
        
        $results = include_once('inc/reserve.inc.php');
        if($results == 'error'){
            echo '<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Nie masz jeszcze ani jednej rezerwacji, skorzystaj z formularza ponizej!
            </h2>';
        }else{
    ?>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Twoje rezerwacje
            </h2>
            <div class="flex flex-col">
                    <div>
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="mx-auto divide-y divide-gray-200 mt-5">
                            <thead class="bg-gray-50">
                                <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Confirmed
                                </th>
                                </tr>
                            </thead>
    <?php 
            foreach ($results as $key => $result) {
    ?>
                            <tbody>
                                <!-- Odd row -->

                                <!-- Even row -->
                                <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?php echo $result['Email'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo $result['Date'] ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php if($result['isConfirmed']){
                                        echo 'Confirmed'; 
                                    }else{
                                        echo 'Not confirmed'; 
                                    }
                                    ?>
                                </td>
                                </tr>
                            </tbody>
                        
    <?php 
            }
        }
    ?>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>


         <!-- RESERVATION LIST START -->
  <!-- NEW VISIT SECTION START -->
  <div class="min-h-full flex items-center justify-center py-6 px-2 sm:px-6 lg:px-8">
    <div class="mt-2 text-center">
        <div id="reservation-section" class="max-w-md w-full space-y-8">
            <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Umów się do nas!
            </h2>
            </div>
            <form class="mt-8 space-y-6" action="inc/reserve.inc.php" method="POST">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="user-email" class="sr-only">Your email</label>
                    <input id="user-email" name="user-email" type="text" autocomplete="user-email" value="<?php echo $_SESSION['email'] ?>" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Your email">
                </div>

                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input datepicker datepicker-format="mm-dd-yyyy" type="text" name="reservation-date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Wybierz datę wizyty!">
                </div>

                <div>
                    <select id="reservation-time" name="reservation-time" placeholder="Choose time" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                      <option>9:00</option>
                      <option>10:00</option>
                      <option>11:00</option>
                      <option>12:00</option>
                      <option>13:00</option>
                      <option>14:00</option>
                      <option>15:00</option>
                      <option>16:00</option>
                    </select>
                  </div>
                
            </div>
            <div>
                <button type="submit" name="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Zapisz się
                </button>
            </div>
            </form>
        </div>
    </div>
  </div>
  <!-- NEW VISIT SECTION END -->
    <?php 
        } else {
    ?>   
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Po zalogowaniu się, będziesz mógł zapisać się na wizytę w naszym zakładzie!
        </h2>
    <?php 
        }
    ?>


    <?php 
        if(!isset($_SESSION['username'])){
    ?>
      <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
         <!-- LOGIN SECTION START -->
         <div id="login-section" class="max-w-md w-full space-y-8">
            <div>
               <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                  Log in to your account
               </h2>
            </div>
            <form class="mt-8 space-y-6" action="inc/login.inc.php" method="POST">
               <input type="hidden" name="remember" value="true">
               <div class="rounded-md shadow-sm -space-y-px">
                  <div>
                     <label for="email-address" class="sr-only">Email address</label>
                     <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                  </div>
                  <div>
                     <label for="password" class="sr-only">Password</label>
                     <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                  </div>
               </div>
               <div>
                  <button type="submit" name="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                     </span>
                     Log in
                  </button>
               </div>
               <div class="text-center underline click-to-register">
                  <a href="#">I do not have an account. Register.</a>
               </div>
            </form>
         </div>
         <!-- LOGIN SECTION END -->

         <!-- REGISTER SECTION START -->
         <div id="register-section" class="max-w-md w-full space-y-8 hidden">
            <div>
               <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                  Register new account
               </h2>
            </div>
            <form class="mt-8 space-y-6" action="inc/register.inc.php" method="POST">
               <input type="hidden" name="remember" value="true">
               <div class="rounded-md shadow-sm -space-y-px">
                  <div>
                     <label for="name" class="sr-only">Email address</label>
                     <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Your name">
                  </div>
                  <div>
                     <label for="email-address" class="sr-only">Email address</label>
                     <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                  </div>
                  <div>
                     <label for="password" class="sr-only">Password</label>
                     <input id="r_password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                  </div>
                  <div>
                     <label for="repeatPassword" class="sr-only">Repeat password</label>
                     <input id="repeatPassword" name="repeatPassword" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Repeat password">
                  </div>
               </div>
               <div>
                  <button type="submit" name="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                     </span>
                     Register
                  </button>
               </div>
               <div class="text-center underline click-to-login">
                  <a href="#">I already have an account. Log in instead.</a>
               </div>
            </form>
         </div>
         <!-- REGISTER SECTION END -->
      </div>
    <?php 
        }
    ?>

      <script src="assets/js/main.js"></script>
      <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>
   </body>
</html>