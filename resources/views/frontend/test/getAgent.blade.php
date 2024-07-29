@php
$agent = $_SERVER['HTTP_USER_AGENT'];
dd($agwnt);
@phpend
<body>

<div id="appp"></div>

<script> 
let agent = navigator.agent;
document.querySelector("#app").innerHTML = agent
</script>

</body>
