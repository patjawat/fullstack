
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const knex = require('../_helpers/knex/pg');

module.exports = {
    getAll: function () {
        return knex('users');
    },
    getOne: function (id) {
        return knex('users').where('id', id);
    },
    create: function (data) {
        const user = {
            username: data.username,
            hash: bcrypt.hashSync(data.password, 10)
        }
        return knex('users').insert(user)
    },
    update: function (id, data) {
        return knex('user').where('id', id).update(data, '*');
    },
    del: function (id, data) {
        return knex('user').where('id', id).del();
    },

    authenticate: function (data){
        return  knex('users').where('username', data.username);        
    }
}