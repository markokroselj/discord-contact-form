<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <meta name="description" content="Contact form">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.6/dist/htmx.min.js" defer></script>
</head>

<body>
    <div class="shadow-md rounded-md w-fit m-5 mx-auto p-6 ring-1 ring-slate-800">
        <h1 class="text-3xl pb-4">Contact us</h1>
        <form id="contactForm" class="flex gap-2" hx-post="sendMsg.php" hx-target="#response" hx-target-4xx="#response" hx-swap="innerHTML">
            <div class="md:w-72">
                <div class="relative w-full min-w-[200px] h-10">
                    <input type="text" required class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900" id="msg" autocomplete="off" placeholder="" name="msg">
                    <label for="msg" class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">Message </label>
                </div>
            </div>
            <button id="sendBtn" class="align-middle select-none font-sans font-bold text-center  transition-all disabled:opacity-10 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="submit">Send</button>
        </form>
        <div hx-ext='response-targets'>
            <div id="response"></div>
        </div>
    </div>

    <script>
        document.addEventListener('htmx:afterRequest', function(event) {
            if (event.detail.xhr.status === 200) {
                document.getElementById('contactForm').reset();
                document.getElementById('msg').blur();
            }
        });
    </script>
</body>

</html>
