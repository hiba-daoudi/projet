let px1 = [];
let py1= [];
let x_vals = [];
let y_vals = [];
let a,b;
function ajouter(){

  let x = parseFloat(document.getElementById("x").value);
  let y = parseFloat(document.getElementById("y").value);
  x_vals.push(x);
  y_vals.push(y);
  document.getElementById("x").value="";
  document.getElementById("y").value="";


}
const model = tf.sequential();
const trained = false;
async function regression(){
// Modèle
model.add(tf.layers.dense({units: 1, useBias:true, inputShape: [1]}));
// Définition de la fonction loss et méthode d'optimasition
model.compile({loss: 'meanSquaredError', optimizer: 'sgd'});
// Données
const xs = tf.tensor1d(x_vals);
const ys = tf.tensor1d(y_vals);
// Training
await model.fit(xs, ys, {
  epochs: 100,  
  callbacks: {
    onEpochEnd: (epoch, log) => {
// Erreur
       console.log("epoch = ", epoch, "  Loss = ", log.loss);
    }
  }
});
document.getElementById("nv").innerHTML='<input type="number" name="" id="pred" ><button  onclick="prediction()">Prédire</button><button  onclick="parametres()">Afficher la droite</button><div style="font-size: large; font-style: normal; " id="predic"> </div><div style="font-size: large; font-style: normal; " id="param"> </div><br>'
}
function prediction(){
  let val = parseFloat(document.getElementById("pred").value);
  output =  model.predict(tf.tensor2d([val], [1,1]));
        const pred = Array.from(output.dataSync())[0]
        console.log("Prediction de ",val," est: ",pred); 
        document.getElementById("predic").innerHTML+= '<br>La prediction de y quand x egale a '+val+ ' est  y = ' + pred +'<br>';
        px1=val;
        py1=pred;
}
function parametres(){
  a = model.getWeights()[0].dataSync();
  b = model.getWeights()[1].dataSync();
  document.getElementById("param").innerHTML= "<br> L'equation de la droite est : " + a + " x + "+ b;


}
function setup() {
  createCanvas(400, 400);
  }
function draw() {
  background(0);
  stroke(255);
  strokeWeight(8);
    for (let i = 0; i < x_vals.length; i++) {
      let px=x_vals[i]*30;
      let py=height-y_vals[i]*30;
      point(px, py);
    }
  stroke(233,23,45);
  strokeWeight(8);
  let px2=px1*30;
  let py2=height-py1*30;
  point(px2, py2);
  const lineX = [0, 13.33];
      a2=parseFloat(a);
      b2=parseFloat(b);
      let lineY1=lineX[0]*a2+b2;
      let lineY2=lineX[1]*a2+b2;
      px3=lineX[0]*30;
      py3=height-lineY1*30;
      px4=lineX[1]*30;
      py4=height-lineY2*30;
      strokeWeight(2);
      stroke(233,23,25);
      
    line(px3,py3,px4,py4);
   }