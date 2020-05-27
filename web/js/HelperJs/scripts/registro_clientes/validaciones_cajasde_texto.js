

				  function validarLetras(e) { // 1
				    tecla = (document.all) ? e.keyCode : e.which;
				    if (tecla==8) return true; // backspace
				    if (tecla==9) return true; // tabulador
				if (tecla==32) return true; // espacio


				if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
				if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
				if (e.ctrlKey && tecla==88) { return true;} //Ctrl x

				 
				patron = /[a-zA-Ñ]/; //patron
				 ///^[a-zA-Z ñ Ñ á Á éÉ íÍ óÓ úÚ]$/
				 
				te = String.fromCharCode(tecla);
				return patron.test(te); // prueba de patron
				}	
				
				
				function validarNumeros(e) { // 1
				tecla = (document.all) ? e.keyCode : e.which; // 2
				if (tecla==8) return true; // backspace
				if (tecla==109) return true; // menos
				    if (tecla==110) return true; // punto
				    if (tecla==9) return true; // tabulador
				if (tecla==189) return true; // guion
				if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
				if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
				if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
				if (tecla>=96 && tecla<=105) { return true;} //numpad
				 
				patron = /[ ,0,1,2,3,4,5,5,6,7,8,9]/; // patron
				// patron = /[ ,a,b,c,d,e,f,g,h,i,j,k,l,m,n,ñ,o,p,q,r,s,t,u,v,w,x,y,z,.]/; //patron
				
				te = String.fromCharCode(tecla);
				return patron.test(te); // prueba
				}

					function validarNumerostecnico(e) { // 1
				tecla = (document.all) ? e.keyCode : e.which; // 2
				if (tecla==8) return true; // backspace
				if (tecla==109) return true; // menos
				     if (tecla==190) return true; // punto
				    if (tecla==9) return true; // tabulador
			
				if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
				if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
				if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
				if (tecla>=96 && tecla<=105) { return true;} //numpad
				 
				patron = /[ ,0,1,2,3,4,5,5,6,7,8,9]/; // patron
				// patron = /[ ,a,b,c,d,e,f,g,h,i,j,k,l,m,n,ñ,o,p,q,r,s,t,u,v,w,x,y,z,.]/; //patron
				
				te = String.fromCharCode(tecla);
				return patron.test(te); // prueba
				}



