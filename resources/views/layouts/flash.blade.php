@if(Session::has('success'))
	<script type="text/javascript">
		$.notify("{{Session::get('success')}}", {
			type:"info", 
			align:"left", 
			verticalAlign:"bottom", 
			delay:7000, 
			animationType:"scale",
			color: "#fff", 
			background: "#3498db",
			icon:"bell"
		});
	</script>
@endif