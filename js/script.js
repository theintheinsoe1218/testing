$(document).ready(function(){
                count();

            $(".cart").click(function(){
                let product_id=$(this).data('id');
                let product_price=$(this).data('price');
                let product_image=$(this).data('image');
                // console.log(product_id,product_image,product_price); 
                let products={
                    id:product_id,
                    price:product_price,
                    image:product_image,
                    qty:1
                }
                
                let productStr=localStorage.getItem("products");
                // console.log(productStr);

                let productArr;
                if(productStr==null){
                    productArr=[];
                }else{
                    productArr=JSON.parse(productStr);
                }
                // console.log(productArr);
                
                let status=false;
                $.each(productArr,function(i,v){
                    // console.log(i);
                    if(product_id==v.id){
                        status=true;
                        v.qty++;

                    }
                });
                if(status==false){
                    productArr.push(products);
                }

                let data=JSON.stringify(productArr);
                localStorage.setItem("products",data);
                // console.log(data);
                count();



            })

            function count(){
                let productStr=localStorage.getItem("products");
                if(productStr){
                    let productArr=JSON.parse(productStr);
                    if(productArr!=0){
                        let count=productArr.length;
                        $("#count").text(count);
                    }else{
                        $("#count").text('');

                    }
                }
            }
        })