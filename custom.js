$(document).ready(function(){
	showdata();
	count();
	$(".addtocartBtn").click(function(){
		var id=$(this).data('id');
		var codeno=$(this).data('code');
		var name=$(this).data('name');
		var photo=$(this).data('photo');
		var price=$(this).data('price');
		var discount=$(this).data('discount');

		var item={
			id:id,
			code:codeno,
			name:name,
			photo:photo,
			price:price,
			discount:discount,
			qty:1
		}

		// console.log(item);
		var itemlist=localStorage.getItem("items");
		var itemArray;
		if (itemlist==null){
			itemArray=[];
		}else{
			itemArray=JSON.parse(itemlist);
		}
		var status= false;
		$.each(itemArray,function(i,v){
			if(v.id==id){
			// alert("ok");
			v.qty++;
			status=true;
			}
			
		})
		if(!status){
			itemArray.push(item);	
		}
		

		// console.log(itemArray);

		var itemstring=JSON.stringify(itemArray);
		localStorage.setItem('items', itemstring);
		showdata();
	})
	function showdata(){
		var itemlist=localStorage.getItem("items");
		// console.log(itemlist);
	
			var itemArray=JSON.parse(itemlist);
			// console.log(itemArray);
			var html="";
			
			var total=0;
			$.each(itemArray,function(i,v){
				if(v.discount){
				var subtotal=v.qty*v.discount;
			}else{
				var subtotal=v.qty*v.price;
			}
				
				total+=subtotal;
				
				html+=`
					<tr>
					
					<td>
						<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%" data-id="${i}"> 
						<i class="icofont-close-line"></i> 
						</button> 
					</td>
					<td><img src="${v.photo}" class="cartImg" ></td>
					<td><p>${v.name}</p><p>${v.code}</p></td>
					<td>
						<button class="btn btn-outline-secondary plus_btn" data-id="${i}"> 
						<i class="icofont-plus"></i> 
						</button>
					</td>
					<td>${v.qty}</td>
					<td>
						<button class="btn btn-outline-secondary minus_btn" data-id="${i}"> 
						<i class="icofont-minus"></i>
						</button>
					</td>
					<td><p class="text-danger">${v.discount}</p><p class="font-weight-lighter"><del>${v.price}</del></p></td>
					<td>${subtotal}</td>	
					</tr>
					`
							

			})

			html+=`
			<tr>
				<td colspan="8">
					<h3 class="text-right"> Total : ${total} </h3>
				</td>
			</tr>
			<tr> 
				<td colspan="5"> 
					<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
				</td>
				<td colspan="3">
					<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
						Check Out 
					</button>
				</td>
			</tr>
			`
			$('tbody').html(html);
			$('.mms').html(total);
		
	}
	$("#shoppingcart_table").on("click",".remove", function(){
		// alert("ok");
		var id=$(this).data("id");
		console.log(id);
		var itemlist=localStorage.getItem("items");
		var itemArray=JSON.parse(itemlist);
		itemArray.splice(id,1);
		var itemstring=JSON.stringify(itemArray);
		localStorage.setItem("items",itemstring);
		showdata();
	})
	$("#shoppingcart_table").on("click",".plus_btn", function(){
		
		var id=$(this).data("id");
		var itemlist=localStorage.getItem("items");
		var itemArray=JSON.parse(itemlist);
		$.each(itemArray,function(i,v){
			if(i==id){
				v.qty++
			}
		})
		var itemstring=JSON.stringify(itemArray);
		localStorage.setItem("items",itemstring);
		showdata();
	})
	$("#shoppingcart_table").on("click",".minus_btn", function(){
		var id=$(this).data("id");
		var itemlist=localStorage.getItem("items");
		var itemArray=JSON.parse(itemlist);
		$.each(itemArray,function(i,v){
			if(i==id){
				v.qty--;
				if(v.qty==0){
					itemArray.splice(id,1);
				}
			}
		})
		var itemstring=JSON.stringify(itemArray);
		localStorage.setItem("items",itemstring);
		showdata();
	})

	function count(){
		var totalcount=0;
		var itemlist=localStorage.getItem("items");
		var itemArray=JSON.parse(itemlist);
		$.each(itemArray,function(i,v){
			totalcount+=v.qty;
		})
		$(".cartNoti").html(totalcount);
	}

})

