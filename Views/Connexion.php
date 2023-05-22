<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .bg__image{
        background-image: url('https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg?size=626&ext=jpg&ga=GA1.2.1597107389.1684352534&semt=sph');
        background-repeat: no-repeat;
        background-position: center;
        height: 90vh;
        width: 90%;
        position: absolute;
        left: -300px;
        z-index: -1;
    }
  </style>
</head>
<body>
<form action="main"  method="POST">
<div class="bg__image hidden md:block" ></div>
<div class="min-h-screen  py-6 flex flex-col justify-center sm:py-12 float-right mr-40">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-green-700 to-green-300 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-2xl font-semibold">Veuillez vous connecter</h1>
				</div>
				<div class="divide-y divide-gray-200">
					<div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <div class="relative">
                            <input autocomplete="off" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-green-500 mb-7" />
                            <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Adresse Email</label>
                          </div>
						<div class="relative">
                            <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-green-500 mb-5"  />
                            <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Mot de passe</label>
                          </div>
						<div class="relative">
							<input type="submit" class="bg-green-500 text-white rounded-md px-2 py-1 mt-3"value="Connexion">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</body>
</html>
