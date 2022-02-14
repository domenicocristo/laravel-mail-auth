<template>
    <section id="videogames">
        <h1>Videogames:</h1>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Rating</th>
                <th>Delete</th>
            </tr>
            <tr v-for="videogame in videogames" :key="videogame.id">
                <td>{{ videogame.id }}</td>
                <td>{{ videogame.title }}</td>
                <td>{{ videogame.subtitle }}</td>
                <td>{{ videogame.rating }}</td>
                <td>
                    <button @click="deleteVideogame(videogame.id)" class="btn btn-danger">DELETE</button>
                </td>
            </tr>
        </table>
    </section>
</template>

<script>
export default {
    data: function() {
        return {
            videogames: []
        };
    },

    props: {
        user: String
    },

    methods: {
        deleteVideogame(id) {
            axios.get(`/api/videogame/delete/${id}`)
            .then(r => {
                const ind = this.getIndexById(id);
                this.videogames.splice(ind, 1);
            })
            .catch(e => console.error('e', e));
        },

        getIndexById(id) {
            for (let x=0; x<this.videogames.length; x++) {
                const videogame = this.videogames[x];

                if (videogame.id == id)
                    return x;
            }
            return -1;
        },
    },

    mounted() {
        axios.get('/api/videogames/list')
        .then(r => this.videogames = r.data)
        .catch(e => console.error(e));
    }
}
</script>