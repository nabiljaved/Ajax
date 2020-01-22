
$(function () {

	
  	var $listgroup = $(".list-group");
  	
	function getpost()
  {

  	//select a dom element

		
$.ajax({
	url: "https://jsonplaceholder.typicode.com/posts",
	method : "GET",
	success : function(data)
	{
		//console.log(data);

		// i want ten results 
		var newdata = data.slice(0, 10);
		var listitem = [];
		newdata.forEach(function(newItem){
			console.log("new item", newItem);

			// create li and append listgroup
			var $li = $("<li/>", {

				class: "list-group-item",
				"data-id": newItem.id,
				html: newItem.title

			});

			listitem.push($li);

		})

		$listgroup.append(listitem);

	},
		error: function(err)
	{
		console.log("err");
	}

 })		
	}


	getpost();

	// click on a title Event delegation 

	$listgroup.on("click", '.list-group-item', function(event){

		//console.log(event.target);
		//alert("")
		var id = $(event.target).attr("data-id"); 

		$.ajax({

			url: "https://jsonplaceholder.typicode.com/posts/"+ id ,
			method : "GET",
			success : function (data) {
				//console.log("data", data);
				$(".content").html(data.body);
			},
			err : function (){}

		});


	});

});