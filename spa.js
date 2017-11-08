	var perfeito = function(n){
          res = 0;
          for(i = 2; i<=(n); i++){
            if(n % i == 0){
              res+= (n / i);
            }
          }
          return res;
        }
        var numeroExec = function (){
          mensagem = [];
          cont = 2;
          fim = 1;

            while (fim <= 4){
              if(cont == perfeito(cont)){
                fim++;
                mensagem.push(cont);
                cont++;
              }
              else {
                cont++;
              }
            }
        }

       var fibonacci = function(n){
          if(n == 0){return 0;}
          if(n == 1){return 1;}
          else {return fibonacci(n-1) + fibonacci(n-2)}
        }

       var inciar = function(){
          numeroExec();
          fibona = fibonacci(30);
        }


		
	inciar();
	console.log(fibona + mensagem);

