</div>





<script>
$(".code-previewer-area").each(function(){
	$codeTabID = $(this).find(".btn-group-toggle .btn.active").children().attr("id");
	$codeTabContent = $(this).find(".code-previewer-content.active").attr("data-tabContentName");

	$(this).find(".btn-group-toggle .btn").each(function(){
		$(this).click(function(){
			$(this).find(".btn-group-toggle .btn").removeClass("active");
			$(this).addClass("active");
			$getActiveTabID = $(this).children().attr("id");
			console.log($getActiveTabID);
			$(this).parent().parent().find(".code-previewer-content").removeClass("active");
			$(this).parent().parent().find("[data-tabContentName="+$getActiveTabID+"]").addClass("active");
		});
	});
});
</script>




  </body>
</html>