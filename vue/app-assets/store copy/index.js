import Vuex from 'vuex'
import {Database} from '@vuex-orm/core';
import Post from '@/models/Post';

const database = new Database();

databases.register(Post)
export default database;
