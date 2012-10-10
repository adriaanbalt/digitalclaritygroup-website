jQuery(function($){
    $("#twitter .cathymcknight").tweet({
      avatar_size: 32,
      count: 3,
      username: ["cathymcknight"],
      loading_text: "searching twitter...",
      refresh_interval: 120
    });
    $("#twitter .justclarity").tweet({
      avatar_size: 32,
      count: 3,
      username: ["just_clarity"],
      loading_text: "searching twitter...",
      refresh_interval: 120
    });
  });