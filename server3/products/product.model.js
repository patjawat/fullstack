const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const Schema = new Schema({
    name:{type:String,unique:true},
    price:{type:Double,unique:false}
});