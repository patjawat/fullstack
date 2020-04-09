const express = require('express');
const config = require('config.json');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const router = express.Router();
const user = require('./users.service');
const knex = require('../_helpers/knex/pg');


// Router Product
// router.post('product');

router.get('/', getAll);
router.get('/:id',getOne);
router.post('/register',register);
router.post('/authenticate',auth);
router.put('/:id',update);
router.delete('/:id',deleted);

module.exports = router;


function getAll(req, res, next){
    user.getAll()
    .then((result) => {
            return res.json(result);
        })
    // return res.json(req.params)
}

async function auth(req, res, next) {
    const results = await user.authenticate(req.body);
    const users = results[0];
     if (users && bcrypt.compareSync(req.body.password,users.hash.trim())) {
            const token = jwt.sign({sub: users.id }, config.secret);
            const data = {
                _id:users.id,
                fullname : users.username.trim(),
                token:token.trim(),
            }
            return res.json(data);
        }
}

function getCurrent(req, res, next) {
    userService.getById(req.user.sub)
        .then(user => user ? res.json(user) : res.sendStatus(404))
        .catch(err => next(err));
}

function getOne(req, res,next){
    user.getOne(req.params.id).then((result)=>{
        return res.json(result);
    })
};

function register(req, res,next){

    user.create(req.body).then((result)=>{
        return res.json(result);
    })
};
function update(req, res,next){
    user.update(req.params.id,req.body).then((result)=>{
        return res.json(result);
    })
};
function deleted(req, res,next){
    user.del(req.params.id).then((result)=>{
        return res.json(result);
    })
};
