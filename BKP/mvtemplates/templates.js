
<script id="basket_view" type="text/x-handlebars-template">
	<div class="basket_container">
		<ul>
			{{#each items}}
    			<li>{{this.item_name}}</li>
  			{{/each}}
		</ul>
	</div>
</script>