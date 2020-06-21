
    var i;
      var j;
      var ele; 
      
      
      function creatmat()
      {
              var ligne1=document.getElementById("ligne1").value;
              var colonne1=document.getElementById("colonne1").value;
              var ligne2=document.getElementById("ligne2").value;
              var colonne2=document.getElementById("colonne2").value;
              
  
              if(ligne1 > 9 && colonne1 > 9)
              {
                  document.getElementById("mat").style.display="block";
                  document.getElementById("mat1").style.marginBottom = "5%";
              }else
              {
                  document.getElementById("mat").style.display="flex";
                  document.getElementById("mat1").style.marginRight = "5%";
                  document.getElementById("mat").style.columnCount="2";
  
              }
       //first matrix
          document.getElementById("mat1").innerHTML=" Matrice 1 <br>";
              
            for(i = 1; i <= ligne1 ; i++){
                for(j = 1; j <= colonne1 ; j++){
                 ele=document.createElement('input');
                 ele.id="m1";
                 ele.id="m1("+i+","+j+")";
                 ele.type="text";
                 ele.size="5";
                 
                 document.getElementById("mat1").appendChild(ele);
             }
               
                var br=document.createElement('br');
               document.getElementById("mat1").appendChild(br);
         }
          
      
      
          //second matrix
         document.getElementById("mat2").innerHTML="Matrice 2 <br>";
      
              
            for(i = 1; i <= ligne2 ; i++)
            {
                for(j = 1; j <= colonne2 ; j++)
                {
                 ele=document.createElement('input');
                 
                 ele.id="m2("+i+","+j+")";
                 ele.type="text";
                 ele.size="5";
                 
                 
                 document.getElementById("mat2").appendChild(ele);
              }
               
                var br=document.createElement('br');
               document.getElementById("mat2").appendChild(br);
  
               document.getElementById("mat2").appendChild(br);
  
            }
  
            document.getElementById("botona").innerHTML="<br><br><label id='label1'>Operations sur les matrices: </label><br><input type=\"submit\" name=\"somme\" id=\"botona\" value=\"A+B\" onclick=\"somme();\"> <input type=\"submit\" name=\"soustraction\" id=\"botona\" value=\"A-B\" onclick=\"sous();\"> <input type=\"submit\" name=\"multiplication\" id=\"botona\" value=\"A*B\" onclick=\"multipab();\">  <input type=\"submit\" name=\"multiplication2\" id=\"botona\" value=\"B*A\" onclick=\"multipba();\"><br><input type=\"submit\" name=\"multip\" id=\"botona\" value=\"multiplication\" onclick=\"multip();\"> <input type=\"submit\" name=\"division\" id=\"botona\" value=\"division\" onclick=\"div();\"><br><input type=\"submit\" name=\"maximum\" id=\"botona\" value=\"maximum\" onclick=\"maximum();\"> <input type=\"submit\" name=\"minimum\" id=\"botona\" value=\"minimum\" onclick=\"minimum();\"> <input type=\"submit\" name=\"power\" id=\"botona\" value=\"power\" onclick=\"power();\"><br><input type=\"submit\" name=\"absol\" id=\"botona\" value=\"absol\" onclick=\"absol();\"><input type=\"submit\" name=\"transpo\" id=\"botona\" value=\"transpo\" onclick=\"transpo();\"><input type=\"submit\" name=\"minma\" id=\"botona\" value=\"minma\" onclick=\"minma();\"><input type=\"submit\" name=\"maxma\" id=\"botona\" value=\"maxma\" onclick=\"maxma();\"><input type=\"submit\" name=\"moy\" id=\"botona\" value=\"moy\" onclick=\"moy();\"><input type=\"submit\" name=\"sum\" id=\"botona\" value=\"sum\" onclick=\"sum();\"><input type=\"submit\" name=\"prod\" id=\"botona\" value=\"prod\" onclick=\"prod();\">  ";
          
          }
      var B=document.getElementById("myButton");
      B.addEventListener('click', creatmat, false);
  
      function creer(){
      var i,j,k1,k2,v1,v2;
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      ligne1=parseInt(ligne1);
      colonne1=parseInt(colonne1);
      ligne2=parseInt(ligne2);
      colonne2=parseInt(colonne2);
      const buffer1 = tf.buffer([ligne1, colonne1]);
      const buffer2 = tf.buffer([ligne2, colonne2]);
      for (let i = 1; i <= ligne1; i++) {
          for (let j = 1; j<=colonne1; j++) {
           k1=  "m1("+i+","+j+")";
           v1=document.getElementById(k1).value;
           v1=parseInt(v1);
          buffer1.set(v1,i-1,j-1);
            
          } 
      }
      for (let i = 1; i <= ligne2; i++) {
          for (let j = 1; j<=colonne2; j++) {
          
          k2=  "m2("+i+","+j+")";
           v2=document.getElementById(k2).value;
           v2=parseInt(v2);
          buffer2.set(v2,i-1,j-1)    
          } 
      }
      tens1= buffer1.toTensor()
      tens1.print();
      tens2=buffer2.toTensor()
      tens2.print(); }
      function somme(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible d\'effectuer leur somme. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
      tens3=tens1.add(tens2);
      tens3.print();
      document.getElementById("resu").innerHTML="<br>La somme des deux matrices est :<br>";
      document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
  
  }   
      }
      function sous(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
          if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible d\'effectuer leur soustraction. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
          tens3=tens1.sub(tens2);
          document.getElementById("resu").innerHTML="<br>La soustraction des deux matrices est <br> ";
          document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function multipab(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
  if (colonne1!=ligne2){
      alert('le nombre de colonne de la premiere matrice "'+colonne1+'" est different du nombre de ligne de la deuxiemme'+ligne2+ '"')
  }
  else{
      tens3=tens1.matMul(tens2);
      document.getElementById("resu").innerHTML="<br>La multiplication des deux matrices est <br> ";
      document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function multipba(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
  if (colonne2!=ligne1){
      alert('le nombre de colonne de la deuxiemme matrice "'+colonne2+'" est different du nombre de ligne de la premiere"'+ligne1+'"')
  }
  else{
      tens3=tens2.matMul(tens1);
      document.getElementById("resu").innerHTML="<br>La multiplication des deux matrices B*A est <br> ";
      document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function div(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible d\'effectuer leur division element par element. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
          tens3=tens1.div(tens2);
          document.getElementById("resu").innerHTML="<br>La division element par element des deux matrices est <br>";
          document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function multip(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible d\'effectuer leur multiplication element par element. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
          tens3=tens1.mul(tens2);
          document.getElementById("resu").innerHTML="<br>La multiplication element par element des deux matrices est <br>";
          document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function maximum(){
          document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible de creer la matrice maximum. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
          tens3=tens1.maximum(tens2);
          document.getElementById("resu").innerHTML="<br>La matrice composee par les maximums des deux matrices est <br>";
          document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function minimum(){
          document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible de creer la matrice minimum. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
          tens3=tens1.minimum(tens2);
          document.getElementById("resu").innerHTML="<br>La matrice composee par les minimums des deux matrices est <br>";
          document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function power(){
      document.getElementById("resultat").innerHTML="";
      creer()
      var ligne1=document.getElementById('ligne1').value;
      var colonne1=document.getElementById('colonne1').value;
      var ligne2=document.getElementById('ligne2').value;
      var colonne2=document.getElementById('colonne2').value;
      if (ligne1!=ligne2 || colonne1!=colonne2) {
          alert('Les matrices n\'ont pas la meme dimension, donc impossible de creer une matrice composee par les valeurs de la premiere matrice a la puissance des valeurs de la deuxiemme. \nVeuillez inserer des matrices de meme taille.')
      }
      else{
          tens3=tens1.pow(tens2);
          document.getElementById("resu").innerHTML="<br>La matrice composee par les valeurs de la premiere matrice a la puissance des valeurs de la deuxiemme est <br> ";
          document.getElementById("resu").style.textAlign="center";
  l=0;
  for( i= 1; i <= tens3.shape[0] ; i++){
  ligne=document.createElement('tr');
  ligne.id="l"+i;
  document.getElementById("resultat").appendChild(ligne);
  
  for( j = 1; j <= tens3.shape[1]  ; j++){
      col=document.createElement('td');
             col.id="c"+i+j;
             col.class="td";
             col.width="25%";
            document.getElementById(ligne.id).appendChild(col);
            document.getElementById(col.id).innerHTML=tens3.dataSync()[l];
            document.getElementById(col.id).style.border="1px solid black";
          l=l+1;
  }}
  document.getElementById("resultat").style.textAlign="center";
  document.getElementById("resultat").style.margin="auto";
  document.getElementById("resultat").style.paddingTop="3%";
  document.getElementById("resultat").style.paddingBottom="3%";
      }}
      function absol(){
          creer()
          tens3=tens1.abs();
          tens4=tens2.abs();
          document.getElementById("resultat").innerHTML="<br>La matrice composee par les valeurs absolues de la premiere matrice est <br> <br>";
          
      var l=0;
      for( var i= 1; i <= tens3.shape[0] ; i++){
      for( var j = 1; j <= tens3.shape[1] ; j++){
          document.getElementById("resultat").innerHTML+=tens3.dataSync()[l]+"&nbsp";
          l=l+1;
      }
      document.getElementById("resultat").innerHTML+="<br>";
  }
  document.getElementById("resultat").innerHTML+="<br>La matrice composee par les valeurs absolues de la deuxiemme matrice est <br> <br>";
  var l=0;
      for( var i= 1; i <= tens4.shape[0] ; i++){
      for( var j = 1; j <= tens4.shape[1] ; j++){
          document.getElementById("resultat").innerHTML+=tens4.dataSync()[l]+"&nbsp";
          l=l+1;
      }
      document.getElementById("resultat").innerHTML+="<br>";
  }
  
      }
      function transpo(){
          creer()
          tens3=tens1.transpose();
          tens4=tens2.transpose();
          document.getElementById("resultat").innerHTML="<br>La matrice transpose de la premiere matrice est <br> <br>";
          var l=0;
      for( var i= 1; i <= tens3.shape[0] ; i++){
      for( var j = 1; j <= tens3.shape[1] ; j++){
          document.getElementById("resultat").innerHTML+=tens3.dataSync()[l]+"&nbsp";
          l=l+1;
      }
      document.getElementById("resultat").innerHTML+="<br>";
  }
  document.getElementById("resultat").innerHTML+="<br>La matrice transpose de la deuxiemme matrice est <br> <br>";
  var l=0;
      for( var i= 1; i <= tens4.shape[0] ; i++){
      for( var j = 1; j <= tens4.shape[1] ; j++){
          document.getElementById("resultat").innerHTML+=tens4.dataSync()[l]+"&nbsp";
          l=l+1;
      }
      document.getElementById("resultat").innerHTML+="<br>";
  }
      }
      function minma(){
          creer()
          a=tens1.min();
          b=tens2.min();
          document.getElementById("resu").innerHTML="";
          document.getElementById("resultat").innerHTML="<br>Le minimum de la premiere matrice est "+ a.dataSync() +"<br>Le minimum de la deuxiemme matrice est "+ b.dataSync();
      }
      function maxma(){
          creer()
          a=tens1.max();
          b=tens2.max();
          document.getElementById("resu").innerHTML="";
          document.getElementById("resultat").innerHTML="<br>Le maximum de la premiere matrice est "+ a.dataSync() +"<br>Le maximum de la deuxiemme matrice est "+ b.dataSync();
      }
      function moy(){
          creer()
          a=tens1.mean();
          b=tens2.mean();
          document.getElementById("resu").innerHTML="";
          document.getElementById("resultat").innerHTML="<br>La valeur moyenne de la premiere matrice est "+ a.dataSync() +"<br>La valeur moyenne de la deuxiemme matrice est "+ b.dataSync();
      }
      function sum(){
          creer()
          a=tens1.sum();
          b=tens2.sum();
          document.getElementById("resu").innerHTML="";
          document.getElementById("resultat").innerHTML="<br>La somme des valeurs de la premiere matrice est "+ a.dataSync() +"<br>La somme valeurs de la deuxiemme matrice est "+ b.dataSync();
      }
      function prod(){
          creer()
          a=tens1.prod();
          b=tens2.prod();
          document.getElementById("resu").innerHTML="";
          document.getElementById("resultat").innerHTML="<br>Le produit des valeurs de la premiere matrice est "+ a.dataSync() +"<br>Le produit des valeurs de la deuxiemme matrice est "+ b.dataSync();
      }
      
      
  
