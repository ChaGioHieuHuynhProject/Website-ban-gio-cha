const animation_register = () => {
  anime
    .timeline({
      duration: 800,
      easing: "linear",
    })
    .add({
      targets: ".login-right",
      translateX: -450,
    })
    .add(
      {
        targets: ".login-left",
        translateX: 450,
      },
      "-=1000"
    )
    .add(
      {
        targets: ".register-right",
        translateX: 450,
      },
      "-=1000"
    )
    .add(
      {
        targets: ".login-right img",
        keyframes: [
          { opacity: 1 },
          { opacity: 0 },
          { opacity: 0.5 },
          { opacity: 1 },
        ],
        complete: () => {
          $("#bg-login").addClass("hidden");
          $("#bg-register").removeClass("hidden");
        },
      },
      "-=1000"
    )
    .add(
      {
        targets: ".login-right img",
        keyframes: [
          { opacity: 1 },
          { opacity: 0 },
          { opacity: 0.5 },
          { opacity: 1 },
        ],
        complete: () => {
          $("#login-left").addClass("hidden");
          $("#register-right").removeClass("hidden");
        },
      },
      "-=1000"
    )
    .add(
      {
        targets: ".login-exit",
        translateX: -370,
        duration: 1000,
      },
      "-=1000"
    );
};
// ________________________________

const animation_login = () => {
  anime
    .timeline({
      duration: 1000,
      easing: "linear",
      derection: "reverse",
    })
    .add({
      targets: ".login-right",
      translateX: 0,
      delay: 500,
    })
    .add(
      {
        targets: ".login-left",
        translateX: 0,
      },
      "-=1000"
    )
    .add(
      {
        targets: ".register-right",
        translateX: 0,
      },
      "-=1000"
    )
    .add(
      {
        targets: ".login-right img",
        keyframes: [
          { opacity: 1 },
          { opacity: 0 },
          { opacity: 0.5 },
          { opacity: 1 },
        ],
        complete: () => {
          $("#bg-register").addClass("hidden");
          $("#bg-login").removeClass("hidden");
        },
      },
      "-=1000"
    )
    .add(
      {
        targets: ".register-right",
        keyframes: [
          { opacity: 1 },
          { opacity: 0 },
          { opacity: 0.5 },
          { opacity: 1 },
        ],
        complete: () => {
          $("#register-right").addClass("hidden");
          $("#login-left").removeClass("hidden");
        },
      },
      "-=1000"
    )
    .add(
      {
        targets: ".login-exit",
        translateX: 0,
      },
      "-=1000"
    );
};
