<template>
  <div
    class="
      uk-container
      uk-container-center
      uk-margin-large-top
      uk-margin-large-bottom
    "
  >
    <div class="uk-grid">
      <div class="uk-container-center">
        <Stretch v-show="loading" background="#339ae7"></Stretch>
      </div>
       <div class="well well-sm" style="margin-bottom: 10px;">
        <form
          class="uk-search uk-margin-small-top uk-margin-left uk-hidden-small"
        >
          <input
            class="uk-search-field"
            type="Search "
            v-model.trim="search"
            placeholder="Search Title"
            style="background: #bebdbd"
            autocomplete="off"
            @keyup="loadMovies"
          />
          <div
            class="uk-dropdown uk-dropdown-flip uk-dropdown-search"
            aria-expanded="false"
          ></div>
        </form>
      </div>

      <div
        id="tm-right-section"
        class="uk-width-large-1-1 uk-width-medium-7-10"
        data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}"
      >
        <div
          class="
            uk-grid-width-small-1-3
            uk-grid-width-medium-1-4
            uk-grid-width-large-1-6
          "
          data-uk-grid="{gutter: 20}"
        >
          <div class="container">
            <div class="well well-sm">
              <strong>Toggle</strong>
              <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm"
                  ><span class="glyphicon glyphicon-th-list"> </span>List</a
                >
                <a href="#" id="grid" class="btn btn-default btn-sm"
                  ><span class="glyphicon glyphicon-th"></span>Grid</a
                >
              </div>
            </div>
              <div id="products" class="row  list-group">
                <div v-for="movie in movies" :key="movie.id">
                  <div class="item col-xs-12 col-lg-4">
                    <div class="thumbnail">
                      <img
                        class="group list-group-image"
                        :src="movie.posterurl"
                        alt=""
                      />
                      <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                          {{ movie.title }}
                        </h4>

                        <div v-if="movie.storyline.length < 100">
                          <p class="group inner list-group-item-text">
                            {{ movie.storyline }}
                          </p>
                        </div>
                        <div v-if="movie.storyline.length >= 100">
                          <p class="group inner list-group-item-text">
                            {{ movie.storyline.substring(0, 100) + "....." }}
                          </p>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-md-6">
                            <li
                              v-for="genre in movie.genres"
                              :key="genre.index"
                            >
                              <a href="#">Genres: {{ genre }}</a>
                            </li>
                          </div>
                          <div class="col-xs-12 col-md-6">
                            <span class="rating">Rating:
                              <i class="uk-icon-star"> {{ movie.imdbRating }}</i>
                            </span>
                          </div>
                          <div class="col-xs-12 col-md-6">
                            <span class="uk-float-left">Year: {{ movie.year }}</span
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
$(document).ready(function () {
  $("#list").click(function (event) {
    event.preventDefault();
    $("#products .item").addClass("list-group-item");
  });
  $("#grid").click(function (event) {
    event.preventDefault();
    $("#products .item").removeClass("list-group-item");
    $("#products .item").addClass("grid-group-item");
  });
});
export default {
  data() {
    return {
      page: 1,
      pages: [],
      movies: {},
      loading: true,
      search: "",
    };
  },
  methods: {
    loadMovies() {
      this.loading = true;
      axios
        .get("/api/v1/movies")
        .then(({ data }) => {
          if (this.search) {
            this.movies = data.movies.filter((movie) =>
              movie.title.toLowerCase().includes(this.search.toLowerCase())
            );
            this.ratingStars(this.movies);
            this.loading = false;
          } else {
            this.movies = data.movies;
            this.ratingStars(this.movies);
            this.loading = false;
          }
        })
        .catch((error) => {
          console.log("Error", error);
        });
    },

    ratingStars(movies) {
      movies.forEach((movie) => {
        movie.imdbRating = Math.round(movie.imdbRating * 10);
      });
    },
  },
  components: {
    Stretch,
  },

  created() {
    this.loadMovies();
  },
};
</script>

      <style>
/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
.glyphicon {
  margin-right: 5px;
}
.thumbnail {
  margin-bottom: 20px;
  padding: 0px;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}

.item.list-group-item {
  float: none;
  width: 100%;
  background-color: #fff;
  margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,
.item.list-group-item:hover {
  background: #428bca;
}

.item.list-group-item .list-group-image {
  margin-right: 10px;
}
.item.list-group-item .thumbnail {
  margin-bottom: 0px;
}
.item.list-group-item .caption {
  padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd) {
  background: #eeeeee;
}

.item.list-group-item:before,
.item.list-group-item:after {
  display: table;
  content: " ";
}

.item.list-group-item img {
  float: left;
}
.item.list-group-item:after {
  clear: both;
}
.list-group-item-text {
  margin: 0 0 11px;
}
</style>