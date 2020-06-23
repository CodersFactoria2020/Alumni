import ForumHome from './components/forumhome'; 
import Forum from './components/forum';
import ThreadCreate from './components/thread.create';
import Thread from './components/thread';
import Search from './components/search';

const routes = [
    {
        path: '/forum/:id',
        component: Forum,
        name: 'forum'
    },

    {
        path: '/thread/create',
        component: ThreadCreate,
        name: 'thread.create'
    },

    {
        path: '/thread/:id',
        component: Thread,
        name: 'thread'
    },

    {
        path: '/search',
        component: Search,
        name: 'search'
    },

    {
        path: '/forumhome',
        component: ForumHome,
        name: 'forumhome'
    }
];

export default routes;