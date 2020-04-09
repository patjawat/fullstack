const express = require('express');
const router = express.Router();
const product = require('./products.service');

// Router Product
// router.post('product');

router.get('/', getAll);
router.get('/:id',getOne);
router.post('/',create);
router.put('/:id',update);
router.delete('/:id',deleted);

module.exports = router;


function getAll(req, res, next){
    product.getAll()
    .then((result) => {
            return res.json(result);
        })
}


function getOne(req, res,next){
    product.getOne(req.params.id).then((result)=>{
        return res.json(result);
    })
};

function create(req, res,next){
    product.create(req.body).then((result)=>{
        return res.json(result[0]);
    })
};
function update(req, res,next){
    product.update(req.params.id,req.body).then((result)=>{
        return res.json(result);
    })
};
function deleted(req, res,next){
    product.del(req.params.id).then((result)=>{
        return res.json(result);
    })
};
