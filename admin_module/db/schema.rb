# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `bin/rails
# db:schema:load`. When creating a new database, `bin/rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema[7.0].define(version: 0) do
  create_table "quiz_inventory", id: false, charset: "utf8mb4", collation: "utf8mb4_0900_ai_ci", force: :cascade do |t|
    t.string "quiz_code", limit: 45
    t.text "type_of_quiz"
    t.text "question"
    t.text "choices"
    t.text "answer"
    t.integer "points"
  end

  create_table "quiz_list", id: false, charset: "utf8mb4", collation: "utf8mb4_0900_ai_ci", force: :cascade do |t|
    t.text "q_name"
    t.text "q_password"
    t.text "quiz_code"
    t.text "q_display_setting"
    t.integer "total_score", null: false
    t.date "start_date", null: false
    t.date "end_date", null: false
  end

  create_table "student_quiz", primary_key: "sq_id", id: :integer, charset: "utf8mb4", collation: "utf8mb4_0900_ai_ci", force: :cascade do |t|
    t.bigint "user_id"
    t.text "quiz_code"
    t.bigint "score"
    t.datetime "timestamp", precision: nil
  end

  create_table "student_quiz_details", primary_key: "sq_id", id: :integer, default: nil, charset: "utf8mb4", collation: "utf8mb4_0900_ai_ci", force: :cascade do |t|
    t.string "quiz_code", limit: 45
    t.string "question", limit: 45
    t.string "answer", limit: 45
  end

  create_table "students", primary_key: "acc_id", id: :integer, default: nil, charset: "utf8mb4", collation: "utf8mb4_0900_ai_ci", force: :cascade do |t|
    t.integer "user_id"
    t.text "password"
    t.string "last_name"
    t.string "first_name"
  end

  create_table "teachers", primary_key: "acc_id", id: :integer, default: nil, charset: "utf8mb4", collation: "utf8mb4_0900_ai_ci", force: :cascade do |t|
    t.integer "user_id"
    t.text "password"
    t.string "last_name"
    t.string "first_name"
  end

end
