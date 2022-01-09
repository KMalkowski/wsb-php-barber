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
                            if($_SESSION['role'] == 'admin'){ 
                               echo '<a href="list.php" class="font-medium text-gray-500 hover:text-gray-900">Lista rezerwacji (admin)</a>';
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
  </div>

  <?php 
        if(isset($_SESSION['username'])){
    ?>


    <?php 
        
        $results = include_once('inc/reserve.inc.php');
        if($results == 'error'){
            echo '<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Nie masz jeszcze ani jednej rezerwacji, skorzystaj z formularza ponizej!
            </h2>';
        }else{
    ?>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Wszystkie rezerwacje
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Confirm
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Remove
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <form method="POST" action="inc/reserve.inc.php">
                                        <input type="text" name="ID" value="<?php echo $result['ID'] ?>" hidden>
                                        <input type="text" name="role" value="<?php echo $_SESSION['role'] ?>" hidden>
                                        <button type="submit" name="confirm" class="text-green-500 hover:text-green-400">Confirm reservation</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <form method="POST" action="inc/reserve.inc.php">
                                        <input type="text" name="ID" value="<?php echo $result['ID'] ?>" hidden>
                                        <input type="text" name="role" value="<?php echo $_SESSION['role'] ?>" hidden>
                                        <button type="submit" name="delete" class="text-red-500 hover:text-red-400">Delete reservation</button>
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                        
    <?php 
            }
        }}
    ?>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>


         <!-- RESERVATION LIST START -->
  

      <script src="assets/js/main.js"></script>
      <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>
   </body>
</html>