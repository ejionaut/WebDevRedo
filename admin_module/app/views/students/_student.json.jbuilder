json.extract! student, :id, :acc_id, :user_id, :password, :last_name, :first_name, :created_at, :updated_at
json.url student_url(student, format: :json)
